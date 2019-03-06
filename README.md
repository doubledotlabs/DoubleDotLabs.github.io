This repository contains Double Dot Labs' website, which displays all current projects, blogs, and other information. It is written in [Jekyll](https://jekyllrb.com), and pulls information from the GitHub API using the [github-metadata](https://github.com/jekyll/github-metadata) plugin.

[![Freenode IRC channel.](https://img.shields.io/badge/irc.freenode.net-%23%23doubledotlabs-brightgreen.svg?color=008499)](https://webchat.freenode.net/?channels=%23%23doubledotlabs&uio=MTY9dHJ1ZSY5PXRydWUmMTE9MjE1e1)
[![Twitter account.](https://img.shields.io/badge/twitter-%40doubledotlabs-blue.svg?color=43b4f9&logo=twitter)](https://twitter.com/doubledotlabs)

## Building

This repository's [Makefile](https://gnu.org/software/make/) contains scripts used for local testing and development. To install the required dependencies, run `make install`. Once that is finished, simply running `make` should build and serve a local version of the site. To clean up build files and such afterwards, run `make clean`.
