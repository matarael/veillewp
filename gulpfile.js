var gulp = require('gulp'),  
    less = require('gulp-less'), // compiles less to CSS
	autoprefixer = require('gulp-autoprefixer'),
    minify = require('gulp-clean-css'), // minifies CSS
    concat = require('gulp-concat'),
    uglify = require('gulp-uglify'), // minifies JS
    rename = require('gulp-rename'),
	plumber = require('gulp-plumber');

var path = {  
	'assets': {
		'less': './assets/less/',
		'js': './assets/js/',
		'fonts': './assets/fonts/'
	}
};
	
gulp.task('styles', function() {
	gulp.src(path.assets.less+'app.less') // get file
	.pipe(plumber())
	.pipe(concat('app.less'))
	.pipe(less())
    .pipe(rename({extname: '.css'}))
	.pipe(autoprefixer())
    .pipe(minify({keepSpecialComments:0}))
    .pipe(gulp.dest('./')); // output: app.css
});

gulp.task('fonts', function(){
	gulp.src([
		path.assets.vendor+'fonts/*',
		path.assets.fonts+'*'
	])
	.pipe(gulp.dest('./fonts/'));
});

gulp.task('scripts', function () {
	gulp.src([
		path.assets.js+'*.js',
	])
	.pipe(plumber())
	.pipe(concat('app.js'))
	.pipe(uglify())
	.pipe(rename({extname: '.js'}))
	.pipe(gulp.dest('./'));
});

gulp.task('watch', function () {
	gulp.watch(path.assets.less+'*.less', ['styles']);
	gulp.watch(path.assets.js+'*.js', ['scripts']);
});

gulp.task('default', ['styles', 'fonts', 'scripts']);


