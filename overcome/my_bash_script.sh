#!/bin/bash
svn export --force --no-auth-cache --username myusername --password mypassword http://1.2.3.4/repos/path/to/repo/ $1 2>&1
find $1 -print0 -type d | xargs -0 -n 1 -0 chown -R -v root:root 2>&1
find $1'storage' -print0 -type d | xargs -0 -n 1 chown -R -v apache 2>&1
find $1'shared' -print0 -type d | xargs -0 -n 1 chown -R -v apache 2>&1

/**
* The purpose of the script is to do an export of an svn repo and set user permissions correctly.
* PHP runs as the apache user.
* The explanations in the php are to run this script regarding adding the line to sudoers
* Whereas we're referring to
*
* apache ALL=(ALL) NOPASSWD: /bin/bash /var/www/my_bash_script.sh *
*/
