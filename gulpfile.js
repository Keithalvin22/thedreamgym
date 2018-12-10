var gulp = require('gulp');
var livereload = require('gulp-livereload')
var uglify = require('gulp-uglifyjs');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var sourcemaps = require('gulp-sourcemaps');
var imagemin = require('gulp-imagemin');
var pngquant = require('imagemin-pngquant');




gulp.task('imagemin', function () {
    return gulp.src('./module/candidate_list/images/*')
        .pipe(imagemin({
            progressive: true,
            svgoPlugins: [{removeViewBox: false}],
            use: [pngquant()]
        }))
        .pipe(gulp.dest('./module/candidate_list/images'));
});


gulp.task('sass', function () {
  gulp.src('./module/candidate_list/sass/*.scss')
    .pipe(sourcemaps.init())
        .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
        .pipe(autoprefixer('last 2 version', 'safari 5', 'ie 7', 'ie 8', 'ie 9', 'opera 12.1', 'ios 6', 'android 4'))
    .pipe(sourcemaps.write('./'))
    .pipe(gulp.dest('./module/candidate_list/css'));
});


gulp.task('uglify', function() {
  gulp.src('./module/candidate_list/lib/*.js')
    .pipe(uglify('main.js'))
    .pipe(gulp.dest('./module/candidate_list/js'))
});

gulp.task('watch', function(){
    livereload.listen();

    gulp.watch('./module/candidate_list/sass/**/*.scss', ['sass']);
    gulp.watch('./module/candidate_list/lib/*.js', ['uglify']);
    gulp.watch(['./module/candidate_list/css/style.css', './module/candidate_list/**/*.twig', './module/candidate_list/js/*.js'], function (files){
        livereload.changed(files)
    });
});
