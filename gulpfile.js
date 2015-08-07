var fs = require('fs');
var path = require('path');
var gulp = require('gulp');
var jshint = require('gulp-jshint');
var browserify = require('browserify');
var minifyCss = require('gulp-minify-css');
var gutil = require('gulp-util');
var source = require('vinyl-source-stream');
var buffer = require('vinyl-buffer');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var Pageres = require('pageres');
var rimraf = require('rimraf');


gulp.task('lint', function () {
  return gulp.src([
    'gulpfile.js', 'src/**/*.js', 'test/**/*.js'
  ])
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});


gulp.task('browserify', function () {
  var bundler = browserify('./src/main.js');
  bundler.ignore('jquery');
  return bundler.bundle()
    .on('error', gutil.log.bind(gutil, 'Browserify Error'))
    .pipe(source('bundle.js'))
    .pipe(buffer())
    .pipe(gulp.dest('src'))
    .pipe(uglify())
    .pipe(rename({ extname: '.min.js' }))
    .pipe(gulp.dest('dist'));
});


gulp.task('css', function () {
  return gulp.src([ 'src/style.css' ])
    .pipe(minifyCss())
    .pipe(gulp.dest('dist'));
});


gulp.task('screenshot', function (done) {
  var host = '192.168.99.100';
  var port = 8080;
  var dest = path.join(__dirname, 'tmp');
  var pageres = new Pageres({ delay: 2 })
    .src(host + ':' + port, ['880x660' ]/*, { crop: true }*/)
    .dest(dest);

  pageres.run(function (err) {
    if (err) { return done(err); }
    fs.renameSync(path.join(dest, host + '!' + port + '-880x660.png'), path.join(__dirname, 'src', 'screenshot.png'));
    rimraf(dest, done);
  });
});


gulp.task('copy', function () {
  gulp.src([ '*.php', 'screenshot.png' ], { cwd: 'src' })
    .pipe(gulp.dest('dist'));
});


gulp.task('build', [ 'browserify', 'css', 'copy' ]);
gulp.task('default', [ 'lint', 'build' ]);

