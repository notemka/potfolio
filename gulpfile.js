"use strict";

	var gulp = require("gulp"),
		connect = require("gulp-connect"),
		opn = require("opn"),
		concatCss = require("gulp-concat-css"),
		rename = require("gulp-rename"),
		minifyCss = require("gulp-minify-css"),
		autoprefixer = require("gulp-autoprefixer");

// Запуск сервера с лайврелоадом
gulp.task('connect', function(){
	connect.server({
		root: 'app',
		livereload: true,
		port: 8888
	});
	opn('http://localhost:8888');
});

// Работа с html
gulp.task('html', function(){
	gulp.src('./app/*.html')
	.pipe(connect.reload());
});

// Работа с css 
gulp.task('css', function(){
	gulp.src('./app/css/*.css')
  	.pipe(concatCss('app/css/bundle.css'))
  	.pipe(autoprefixer('last 2 versions'))
  	.pipe(minifyCss())
  	//.pipe(rename('bundle.min.css'))
  	.pipe(connect.reload());
});

// Работа с js
gulp.task('js', function(){
	gulp.src('./app/js/*.html')
	.pipe(connect.reload());
});

// Слежка
gulp.task('watch', function(){
	gulp.watch(['./app/*.html'], ['html']);
	gulp.watch(['./app/css/*.css'], ['css']);
	gulp.watch(['./app/js/*.js'], ['js']);
});

// Задача по умолчанию
gulp.task('default', ['connect', 'watch']);