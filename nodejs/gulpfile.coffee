gulp = require 'gulp'
coffee = require 'gulp-coffee'

gulp.task 'compile', () ->
  gulp.src 'src/**/*.coffee'
      .pipe coffee()
      .pipe gulp.dest('dest')



