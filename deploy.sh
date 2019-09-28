rsync -av ./ nh10g_mathis@campus-imtatlantique.fr:~/campus-imtatlantique --include=public/build --include=public/.htaccess --exclude-from=.gitignore --exclude=".*"
