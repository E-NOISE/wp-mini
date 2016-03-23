'use strict';


const Fs = require('fs');
const Path = require('path');
const Gulp = require('gulp');
const Eslint = require('gulp-eslint');
const MinifyCss = require('gulp-minify-css');
const Uglify = require('gulp-uglify');
const Rename = require('gulp-rename');
const Pageres = require('pageres');
const Rimraf = require('rimraf');
const Replace = require('gulp-replace');
const Zip = require('gulp-zip');
const Pkg = require('./package.json');


Gulp.task('lint', () => {

  return Gulp.src(['**/*.js'])
    .pipe(Eslint())
    .pipe(Eslint.format())
    .pipe(Eslint.failAfterError());
});


Gulp.task('uglify', () => {

  return Gulp.src(['./src/main.js'])
    .pipe(Uglify())
    .pipe(Rename({ extname: '.min.js' }))
    .pipe(Gulp.dest('dist'));
});


Gulp.task('css', () => {

  return Gulp.src(['src/style.css'])
    .pipe(MinifyCss())
    .pipe(Gulp.dest('dist'));
});


Gulp.task('screenshot', (done) => {

  const host = '192.168.99.100';
  const port = 8080;
  const dest = Path.join(__dirname, 'tmp');
  const pageres = new Pageres({ delay: 2 })
    .src(host + ':' + port, ['880x660']/*, { crop: true }*/)
    .dest(dest);

  pageres.run((err) => {

    if (err) {
      return done(err);
    }

    Fs.renameSync(
      Path.join(dest, host + '!' + port + '-880x660.png'),
      Path.join(__dirname, 'dist', 'screenshot.png')
    );

    Rimraf(dest, done);
  });
});


Gulp.task('copy:src', () => {

  return Gulp.src(['**/*.php', 'main.js'], { cwd: 'src' })
    .pipe(Replace(
      '\'main\', get_template_directory_uri() . \'/main.js\'',
      '\'main\', get_template_directory_uri() . \'/main.min.js\''
    ))
    .pipe(Gulp.dest('dist'));
});


Gulp.task('copy:lang', () => {

  return Gulp.src(['*'], { cwd: 'src/languages' })
    .pipe(Gulp.dest('dist/languages'));
});


Gulp.task('copy', ['copy:src', 'copy:lang']);


Gulp.task('zip', ['build'], () => {

  return Gulp.src('dist/**/*')
    .pipe(Zip(Pkg.name + '-' + Pkg.version + '.zip'))
    .pipe(Gulp.dest('.'));
});


Gulp.task('watch', () => {

  Gulp.watch(['src/**/*'], ['build']);
});


Gulp.task('build', ['uglify', 'css', 'copy']);
Gulp.task('default', ['lint', 'build']);

