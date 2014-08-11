// Gulp Requires
var gulp = require('gulp'),
    gutil = require('gulp-util'),
    clean = require('gulp-clean'),
    notify = require('gulp-notify'),
    autoprefixer = require('gulp-autoprefixer'),
    sass = require('gulp-sass'),
    livereload = require('gulp-livereload'),
    lr = require('tiny-lr'),
    server = lr();

// Node requires for exec and sys
var exec = require('child_process').exec,
    sys = require('sys');



// Directories
var SRC = 'scss',
    DIST = 'style';



// SCSS Compiling and Minification
gulp.task('scss', function(){
  return gulp.src(SRC + '/style.scss')
    .pipe(
      sass({
        outputStyle: 'expanded',
        debugInfo: true,
        lineNumbers: true,
        errLogToConsole: true,
        onSuccess: function(){
          notify().write({ message: "SCSS Compiled successfully!" });
        },
        onError: function(err) {
          gutil.beep();
          notify().write(err);
        }
      })
    )
    .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe( gulp.dest(DIST) )
    .pipe(livereload(server));
});

// Clean dist directory for rebuild
gulp.task('clean', function() {
  return gulp.src(DIST, {read: false})
    .pipe(clean());
});



// Do the creep, ahhhhhhh!
gulp.task('watch', function() {

  // Listen on port 35729
  server.listen(35729, function (err) {
    if (err) {
      return console.log(err);
    }

    // Watch .scss files
    gulp.watch(SRC + '/**/*.scss', ['scss']);

  });

});


// Gulp Default Task
gulp.task('default', ['scss', 'watch']);
