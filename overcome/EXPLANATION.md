# The Problem
I am a client on a WHM/CPanel server and when connecting via SSH it opens a jailshell

## Example
Commands like 'ps aux' are permitted but do not return any processes being run. 
However, running the same command under the same user using exec() returns a list of all processes including root.

If you run ps aux as root, will return all running processes. Jailshell can be disabled, but all that will do is prevent the cPanel user from being able to login over SSH.
Connecting via SSH as cPanel user. ps aux will only display processes run during that jailshell session and no other processes from that user. 

## Observation
If the same cPanel user creates a php script inside their home directory and echos 'shell_exec('ps aux')' it displays all running processes including root.

## Conclusion
To overcome various root issues such as the follow, it may be worthwhile to create a php script to do it for you to resolve issues involving:
- "transaction lock" issues while running commands such as "rpm" where "su" is not allowed
- Error "can't create transaction lock on /var/lib/rpm/.rpm.lock (Permission denied)" when trying to run the rpm installer for Web Server
- Errors such as "sudo: effective uid is not 0, is sudo installed setuid root?"
- CRITICAL:yum.cli:Config Error: Error accessing file for config file:///etc/yum.conf


## How I Got Here
I attempted to install a web hosted application that ran into issues with playback of uploaded videos and discovered that I needed to add plugins and players to the server to get them to work. For reference: it was installing things such as FFmpeg, Mplayer, and MP4Box in order to use ClipBucket (a php-based application).

**Issues came up while working on guides (just to refresh personal recollection if needed at a later time) such as: **
- How To Prepare The Server For ClipBucket - https://www.hostwinds.com/guide/prepare-server-clipbucket/
- Install FFmpeg, Mplayer, Mencoder, MP4Box, Flvtool2 - https://www.cpanelkb.net/install-ffmpeg-mplayer-mencoder-mp4box-flvtool2/
- Requirements And Installation - https://clipbucket.com/docs/installation/
- How to Install FFmpeg , Mplayer , Mencoder , MP4Box , Flvtool2, and all their libraries - https://www.hivelocity.net/kb/how-to-install-ffmpeg-mplayer-mencoder-mp4box-flvtool2-and-all-their-libraries/
- deny a user access to specific command - https://www.linuxquestions.org/questions/linux-security-4/deny-a-user-access-to-specific-command-432824/
- [Substitude Personal Server address with Project site] - http://www.mplayerhq.hu/design7/news.html

**Helpful discored resource:**
cPanel default open ports - https://www.cpanelkb.net/cpanel-default-open-ports/


**Research & Inspirations**
- why can't I install packages with rpm? I get “transaction lock” [closed] - https://unix.stackexchange.com/questions/125706/why-cant-i-install-packages-with-rpm-i-get-transaction-lock
- CentOS error - sudo: effective uid is not 0, is sudo installed setuid root? - https://stackoverflow.com/questions/37250560/centos-error-sudo-effective-uid-is-not-0-is-sudo-installed-setuid-root
- deny a user access to specific command - https://www.linuxquestions.org/questions/linux-security-4/deny-a-user-access-to-specific-command-432824/
- CRITICAL:yum.cli:Config Error: Error accessing file for config file:///etc/yum/yum.conf - https://help.directadmin.com/item.php?id=385
- Jailshell commands - https://www.reddit.com/r/cpanel/comments/b9t5qs/jailshell_commands/
