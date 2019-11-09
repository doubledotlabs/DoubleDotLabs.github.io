
start: build
	cd _site && http-server

build: install css/styles.css
	bundle exec jekyll build --config _config.yml,_config-dev.yml

install: package-install.lock Gemfile.lock

Gemfile.lock: Gemfile
	bundle install
	touch Gemfile.lock

package-install.lock: package.json
	npm install
	touch package-install.lock

css/styles.css: install css/styles.scss
	node_modules/sass/sass.js css/styles.scss css/styles.css

clean:
	bundle exec jekyll clean
	rm -rf node_modules/
