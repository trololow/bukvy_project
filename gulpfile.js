var	gulp           	= require('gulp'),
    sass           	= require('gulp-sass')(require('sass')),
    rename         	= require('gulp-rename'),
    autoprefixer   	= require('gulp-autoprefixer'),
    notify         	= require("gulp-notify");

gulp.task('sass', function() {
    return gulp.src('assets/sass/**/*.sass')
    .pipe(sass({outputStyle: 'expanded'}).on("error", notify.onError()))
    .pipe(rename({suffix: '.min', prefix : ''}))
    .pipe(autoprefixer({
        overrideBrowserslist: ['last 10 versions']
    }))
    .pipe(gulp.dest('dist/css'))
});

gulp.task('watch', function() {
    gulp.watch( 'assets/sass/**/*.sass', gulp.parallel('sass') );
});

gulp.task('default', gulp.parallel('sass', 'watch'));
