    </div>
    <div class="footer">
        <p>
            Questions? Comments? Contact us at <?php print $admin_email?></a> or find Richard or NeWtoz on irc.mozor.net.
<?php
            $hits = file("hits.db");
            $fp = fopen("hits.db", "w");
            $thispage = explode("/",$_SERVER['PHP_SELF']);
            $thispage = array_pop($thispage);
            if ($fp == false) {
                echo "Error: could not open file hits.db.";
            }
            foreach ($hits as $line) {
                list($page,$numhits,$date) = explode("\t",trim($line));
                if ($page == $thispage) {
                    ++$numhits;
                    echo "            $numhits hits since $date";
                    $found = 1;
                }
                if ($fp) {
                    fwrite($fp,"$page\t$numhits\t$date\n");
                }
            }
            if (!$found && $fp) {
                echo "            1 hit since ".date("M j, Y",time());
                fwrite($fp,$thispage."\t1\t".date("M j, Y",time())."\n");
            }
            fclose($fp);
?>

        </p>
    </div>
</div>
</div>
</div>
  </body>
</html>
