var fs = require('fs');
var path = require('path');
var gulp = require('gulp');
var jshint = require('gulp-jshint');
var minifyCss = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var rename = require('gulp-rename');
var Pageres = require('pageres');
var rimraf = require('rimraf');
var replace = require('gulp-replace');


gulp.task('lint', function () {
  return gulp.src([
    'gulpfile.js', 'src/**/*.js', 'test/**/*.js'
  ])
    .pipe(jshint())
    .pipe(jshint.reporter('jshint-stylish'));
});


gulp.task('uglify', function () {
  return gulp.src( [ './src/main.js'] )
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
  return gulp.src([
    '*.php',
    'languages/*',
    'main.js',
    'screenshot.png'
  ], { cwd: 'src' })
    .pipe(replace(
      "'main', get_template_directory_uri() . '/main.js'",
      "'main', get_template_directory_uri() . '/main.min.js'"
    ))
    .pipe(gulp.dest('dist'));
});


gulp.task('watch', function () {
  gulp.watch([ 'src/**/*' ], [ 'build' ]);
});

gulp.task('build', [ 'uglify', 'css', 'copy' ]);
gulp.task('default', [ 'lint', 'build' ]);

