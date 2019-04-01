const gulp = require('gulp');
const concat = require('gulp-concat');
const autoprefixer = require('gulp-autoprefixer');
const cleanCSS = require('gulp-clean-css');
const uglify = require('gulp-uglify');
const del = require('del');
const babel = require('gulp-babel');

const browserSync = require('browser-sync').create();

const resultFolder = '/build';
//const resultFolder = '';

const cssFiles = [
    './node_modules/normalize.css/normalize.css',
    './src/css/style.css',
    './src/css/bootstrap.min.css'

];

const  jsFiles = [
    './src/js/jquery-3.3.1.min.js',
    './src/js/blocks/aside.js',
    './src/js/blocks/footer.js',
    './src/js/blocks/spec.js',
    './src/js/cabinet/admin.js',
    './src/js/cabinet/admin.js',
    './src/js/cover/page.js',
    './src/js/electrode/page.js',
    './src/js/sheet/page.js',
    './src/js/structural_section/page.js',
    './src/js/list.js',
    './src/js/menu.js'
];

function styles(){
    return gulp.src(cssFiles)
        .pipe(concat('style.css'))
        .pipe(autoprefixer({
            //browsers: ['last 2 versions'],
            browsers: ['>0.1%'],
            cascade: false
        }))
        .pipe(cleanCSS({
            level: 2
        }))
        .pipe(gulp.dest('.' + resultFolder + '/css'))
        .pipe(browserSync.stream());
}

function scripts(){
    return gulp.src(jsFiles, {base: './src'})
    //.pipe(concat('all.js'))
        .pipe(babel({
            presets: ['@babel/env']
        }))
        .pipe(uglify({
            toplevel:true
        }))
        .pipe(gulp.dest('.' + resultFolder))
        .pipe(browserSync.stream());
}



function watch(){
    browserSync.init({
        proxy: "diplom.rus",
        notify: false
    });
    gulp.watch('./src/css/**/*.css', styles);
    gulp.watch('./src/js/**/*.js', scripts);
    gulp.watch('./**/*.php').on('change', browserSync.reload);
    gulp.watch('./*.html', browserSync.reload);
}

//очень опасная штука
function clean(){
    return del(['build/*']);
}


gulp.task('styles', styles);
gulp.task('scripts', scripts);
gulp.task('watch', watch);

gulp.task('build', gulp.series(clean,
    gulp.parallel(styles, scripts)));

gulp.task('dev', gulp.series('build','watch'));

