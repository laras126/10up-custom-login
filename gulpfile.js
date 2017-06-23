'use strict';

var gulp = require('gulp'),
    sass = require('gulp-sass'),
    notify = require('gulp-notify'),
    cssnano = require('gulp-cssnano'),
    rename = require('gulp-rename'),
    autoprefix = require('gulp-autoprefixer'),
    browserSync = require('browser-sync').create();

var throwError = true;

gulp.task('sass', function() {
  return gulp.src('assets/scss/main.scss')
    .pipe(sass())
    .on('error', function(err) {
      return notify().write(err);
    })
    .pipe(autoprefix({
        browsers: 'last 5 versions'
    }))
    .pipe(gulp.dest('assets/css'))
    .pipe(rename({suffix: '.min'}))
    .pipe(cssnano())
    .pipe(gulp.dest('assets/css'));
});

gulp.task('watch', function () {
  browserSync.init({
    proxy: 'wp.local/wp-login.php'
  });
  gulp.watch('assets/**/*.scss', ['sass']);
  gulp.watch(['assets/css/*.css', 'assets/js/*.js']).on('change', browserSync.reload);
});

