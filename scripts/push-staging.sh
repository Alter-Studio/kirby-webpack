#to make this script executable locally run: chmod +x scripts/push-staging.sh
rsync -azP --no-perms --no-owner --no-group --exclude="/content" --exclude="/thumbs" --exclude="/.htaccess" www/ jack@167.99.175.26:/var/www/staging.andymurray.work/public_html
