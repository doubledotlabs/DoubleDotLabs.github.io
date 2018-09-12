---
layout: project
type: undefined
title: Buttery Slack
description: A material design Slack client, made by the butter enthusaists for the butter enthusaists ;)
repo: DoubleDotLabs/ButterySlack
git: git://github.com/DoubleDotLabs/ButterySlack.git
links:
  - name: GitHub
    url: https://github.com/DoubleDotLabs/ButterySlack
    icon: https://github.com/favicon.ico
  - name: Issues
    url: https://github.com/DoubleDotLabs/ButterySlack/issues
    icon: /images/ic/bug.svg
  - name: GNU General Public License v3.0
    url: https://choosealicense.com/licenses/gpl-3.0/
    icon: /images/ic/copyright.svg
contributors:
  - login: TheAndroidMaster
    avatar: https://avatars1.githubusercontent.com/u/13000407?v=4
    url: https://github.com/TheAndroidMaster
  - login: faissaloo
    avatar: https://avatars1.githubusercontent.com/u/8840681?v=4
    url: https://github.com/faissaloo
  - login: pancodemakes
    avatar: https://avatars2.githubusercontent.com/u/6100387?v=4
    url: https://github.com/pancodemakes
---

# ButterySlack
A material design Slack client, made by the butter enthusaists for the butter enthusaists ;)

## Setup

### Building the Project
To build the client, first head over to [this page](https://api.slack.com/custom-integrations/legacy-tokens) and make a legacy API token. Once you have obtained a token, add it to the app as a string-array resource with the name "tokens". It is possible to add multiple tokens for more than one slack group in this array. These tokens provide access to your private data and that of your team. **DO NOT** UPLOAD THEM TO GITHUB BY ACCIDENT (or on purpose but I'm not sure what you'd hope to accomplish by doing that) OR SHARE THEM WITH ANYONE OTHER THAN YOURSELF.

This is a **temporary** solution to provide ButterySlack with access to your account and will be revised before the project is complete.
