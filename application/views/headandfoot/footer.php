        <div>
        	</table>
            </br>
            <table width="100%" border="0" cellspacing="0" cellpadding="0">
              <tr>
                <td height="35" style="background-image: url(<?php echo base_url('images/bottombg.png'); ?>);
                background-repeat:repeat-x;"></td>
              </tr>
              <tr>
                <td bgcolor="#413e4a">
                
            
                  <table width="900" border="0" align="center" cellpadding="10">
                  <tr></tr>
                  <tr>
                  </tr>
                  <tr valign="top">
                    <td width="32%" height="338"><h3><strong>Contact Information</strong></h3>
                      <p class="bottom_text">Melchor Hall, Osmena Ave.,<br />
                        University of the Philippines<br />
                        Diliman, Quezon City, Philippines 1101</p>
                      <p class="bottom_text"><strong>Office of the Dean</strong><br />
                        Telephone: +63 2 920 8860, +63 2 981 8500 loc. 3101-3103, +63 2 928 3144<br />
                        Fax: +63 2 920 8860<br />
                        Email: upengg@coe.upd.edu.ph</p>
                      <p class="bottom_text"><strong>Office of the College Secretary</strong><br />
                        Telephone: +63 2 981 8500 loc. 3104, 3120</p>
                      <p class="bottom_text"><strong>National Graduate School of Engineering</strong><br />
                        Telephone: +63 2 926 0703, +63 2 981 8500 loc. 3105-3106<br />
                        Email: ngse@coe.upd.edu.ph</p></td>
                    <td width="38%" style="color:#000;" align="right"><h3><strong>Quick links</strong></h3>
                      <p class="bottom_links"><a href="https://mail.up.edu.ph/">UP Webmail</a><br />
                        <a href="https://crs.upd.edu.ph/">UP Computerized Registration System</a><br />
                        <a href="http://uvle.up.edu.ph/">UP Virtual Learning Environment</a><br />
                        <a href="http://ilib.upd.edu.ph/">UP Integrated Library System</a><br />
                        <a href="https://mail.up.edu.ph/local/files/aup.html">UP Acceptable Use Policy (AUP) for IT Resources</a><br />
                        <a href="http://time.upd.edu.ph/">UP Diliman Official Time</a></p></td>
                  </tr>
                  </table>
                  <p align="center">Copyright &copy; 2013. ChicharongFlower. All rights reserved.</p>
            
                
                </td>
              </tr>
            </table>
            
</div>
		<!-- LOAD SCRIPTS -->
		<?php if (isset($script)) { ?>
			<script type="text/javascript">
				BASE_URL = "<?php echo base_url() ?>";
			</script>

			<script type="text/javascript" src="<?php echo base_url('codejs/jquery-1.11.0.js') ?>" ></script>
			<?php foreach($script as $s) { ?>
				<script type="text/javascript" src="<?php echo base_url().$s ?>" ></script>
			<?php } ?>
		<?php } ?>
		<!-- END SCRIPTS -->
	</body>
</html>