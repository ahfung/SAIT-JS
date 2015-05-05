var gulp = require('gulp');
var concat = require('gulp-concat');

gulp.task('js', function(){

  gulp.src('js/*.js')
      .pipe(concat('main.js'))
      .pipe(gulp.dest(''))

  gulp.src([
    'bower_components/jquery/dist/jquery.js',
    'bower_components/bootstrap/dist/js/bootstrap.js'
  ])
      .pipe(concat('vendor.js'))
      .pipe(gulp.dest(''))

  gulp.src([
    'bower_components/bootstrap/dist/css/bootstrap.css',
    'bower_components/bootstrap/dist/css/bootstrap-theme.css'
  ])
      .pipe(concat('vendor.css'))
      .pipe(gulp.dest(''))

});

gulp.task('watch', function(){
	gulp.watch('js/*.js', {debounceDelay: 2000}, ['js']);
});

gulp.task('default', ['watch']);
