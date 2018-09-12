npm cache clear --force
git pull

rm -r _projects && mkdir _projects

jekyll build

cd _site/.scripts
rm -rf node_modules && npm install
node update.js

git add ../../_projects
git status
read -p "[Enter] to commit & push, [Ctrl+C] to cancel."
git commit -m "Auto-commit: updated pages"
git push

exit 0
