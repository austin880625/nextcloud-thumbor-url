# Thumbor Url

Get the signed Thumbor image url on Nextcloud.

For use case can refer to [this post](https://blog.austint.in/2022/07/16/thumbor-with-nextcloud.html)

Place this app in **nextcloud/apps/**

Click the file action:

![檔案下拉選單新增的 Get Thumbor Url 選項](https://img.austint.in/DpSLIfYdhSCull-Cpv0AXOKhzXw=/800x0/thumbor-sample/thumborurl-menu.png)

Enter the Thumbor filters like unsafe url:

![輸入 Thumbor 圖片處理選項](https://img.austint.in/1Uaq5CDZmVm7KB1gpQaGjPMLJZo=/800x0/thumbor-sample/thumborurl-enter-filter.png)

Get the signed url:

![帶有 HMAC hash 的圖片 url](https://img.austint.in/p7WrYlm_FmH2MKJHJWw2LIbjZQs=/800x0/thumbor-sample/thumborurl-signed-url.png)


## Building the app

**Warning: the build method below is not tested, so the vendor dependencies are kept and should not need any other steps to perform this building process**

The app can be built by using the provided Makefile by running:

    make

This requires the following things to be present:
* make
* which
* tar: for building the archive
* curl: used if phpunit and composer are not installed to fetch them from the web
* npm: for building and testing everything JS, only required if a package.json is placed inside the **js/** folder

The make command will install or update Composer dependencies if a composer.json is present and also **npm run build** if a package.json is present in the **js/** folder. The npm **build** script should use local paths for build systems and package managers, so people that simply want to build the app won't need to install npm libraries globally, e.g.:

**package.json**:
```json
"scripts": {
    "test": "node node_modules/gulp-cli/bin/gulp.js karma",
    "prebuild": "npm install && node_modules/bower/bin/bower install && node_modules/bower/bin/bower update",
    "build": "node node_modules/gulp-cli/bin/gulp.js"
}
```

