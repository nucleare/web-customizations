<?php
    $result = exec('sudo /bin/bash /var/www/my_bash_script.sh /var/www/vhosts/testsite/htdocs/');
    var_dump($result);
?>

/* The accompanying bash script is found in the /overcome directory as my_bash_script.sh

/**
 * Keep in mind
 * sudoers also restricts parameters that can be passed to a command/script, not just the command itself.
 * hence running .sh without the parameter will work better
 *
 * sudo /bin/bash /var/www/my_bash_script.sh
 * 
 * Rather than follow proper etiquette and comment out in the code
 * the uncorrected version is show above without comments for ease of copy n paste
 */
 
 /** 
 * So, to tell sudoers to allow that script to be run with any parameters (by apache), you would need to
 * add the following line to sudoers:
 * 
 * apache ALL=(ALL) NOPASSWD:/var/www/my_bash_script.sh *
 *
 * The wildcard would allow apache to run that script with any parameters.
 * You will also need /bin/bash in that line so correctly would be
 *
 * apache ALL=(ALL) NOPASSWD: /bin/bash /var/www/my_bash_script.sh *
 *
 */
