<?php
//load .proj file
$server['root']['path']=substr(__FILE__,0,strpos(__FILE__,"system")); // file system path

include($server['root']['path'].'system/dll/config_builder.class');
include($server['root']['path'].'system/dll/live_debug.class');
include($server['root']['path'].'system/config/paths.cfg');
include($server['root']['path'].'system/config/status.cfg');
// load from cfg file all paths stored
include($server['root']['path'].'workplace/projects/'.$workvars['project']['directory'].'/'.$workvars['project']['directory'].'.proj');
if(!isset($properties['identity']['identifier'])):
	include($server['root']['path'].'system/templates/default.proj');
endif;

?>

<div id="settings-warp">
    <div class="ms-selection" id="ms-selection">

			<input type="radio" name="tabs" id="tss-toggle-tab1" checked="checked" />
			<label class="ms-selection-header-label" for="tss-toggle-tab1">General</label>
			
			<input type="radio" name="tabs" id="tss-toggle-tab2" />
			<label class="ms-selection-header-label" for="tss-toggle-tab2">Capabilities</label>
			
			<input type="radio" name="tabs" id="tss-toggle-tab3" />
			<label class="ms-selection-header-label" for="tss-toggle-tab3">Resources</label>
			
			<input type="radio" name="tabs" id="tss-toggle-tab4" />
			<label class="ms-selection-header-label" for="tss-toggle-tab4">Safety</label>
		
			<input type="radio" name="tabs" id="tss-toggle-tab5" />
			<label class="ms-selection-header-label" for="tss-toggle-tab5">Build Rules</label>
			
			<input type="radio" name="tabs" id="tss-toggle-tab6" />
			<label class="ms-selection-header-label" for="tss-toggle-tab6">Development Settings</label>
			
			<input type="radio" name="tabs" id="tss-toggle-tab7" />
			<label class="ms-selection-header-label" for="tss-toggle-tab7">Servers</label>

		  <div id="tss-tab1" class="tss-tab">
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-identity" /><label class="ms-selection-label" for="click-identity" onclick="document.getElementById('ms-identity-contents').classList.toggle('closed');"></label>&nbsp;Identity
				</div>
				<div id="ms-identity-contents" class="ms-slider">
					<center>
					<table>
						<tr>
							<td align="right" width="300px">Bundle Identifier</td>
							<td align="left" width="300px">
							<div class="stripped"><div class="stripped-left"><input type='text' id="bundleId" class="pulse-text" value="<?=$properties['identity']['identifier'];?>" onblur="AjxInput('bundleId', 'system/runtime/ProjCfgFilesFolders.server.php','post');" name='bundleId' /></div><div class="stripped-right" id="bundleId-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Version</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="VersionId" value="<?=$properties['identity']['version'];?>"  class="pulse-text" onblur="AjxInput('VersionId', 'system/runtime/ProjCfgFilesFolders.server.php','post');" name='VersionId' /></div><div class="stripped-right" id="VersionId-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Build</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="BuildId" value="<?=$properties['identity']['build'];?>"  class="pulse-text" onblur="AjxInput('BuildId', 'system/runtime/ProjCfgFilesFolders.server.php','post');" name='BuildId' /></div><div class="stripped-right" id="BuildId-wait"></div></div>
							</td>
						</tr>
					</table>
					</center>
					
				</div>
			</div>
			<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-deploy" /><label class="ms-selection-label" for="click-deploy" onclick="document.getElementById('ms-deploy-contents').classList.toggle('closed');"></label>&nbsp;Deployment
				</div>
				<div id="ms-deploy-contents" class="ms-slider">
					<center>
					<table>
						<tr><td align="right">Deployment Target</td><td></td></tr>
						<tr>
							<td align="right" width="300px">HTML</td>
							<td align="left" width="300px">
								<div class="stripped"><div class="stripped-left"><select id = "deploy_html" name="deploy_html" class="pulse-input" onchange="AjxDropDown('deploy_html', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
									<option value = "5" <?= ($properties['deployment']['Html']=='5') ? 'selected="selected"' : '';?> >Ver. 5</option>
									<option value = "4.1" <?= ($properties['deployment']['Html']=='4.1') ? 'selected="selected"' : '';?>>Ver. 4.1</option>
									</select></div><div class="stripped-right" id="deploy_html-wait"></div></div>					
							</td>
						</tr>
						<tr>
							<td align="right">CSS</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><select id = "deploy_css" name="deploy_css" class="pulse-input" onchange="AjxDropDown('deploy_css', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
								<option value = "3" <?= ($properties['deployment']['Css']=='3') ? 'selected="selected"' : '';?>>Ver. 3</option>
								<option value = "2" <?= ($properties['deployment']['Css']=='2') ? 'selected="selected"' : '';?>>Ver. 2</option>
								</select></div><div class="stripped-right" id="deploy_css-wait"></div></div>
							</td>
						</tr>
						<tr><td align="right"></td><td></td></tr>
						<tr><td align="right">Scripting</td><td></td></tr>
						<tr>
							<td align="right">Java</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><select id = "deploy_java" name="deploy_java" class="pulse-input" onchange="AjxDropDown('deploy_java', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
								<option value = "1.85" <?= ($properties['deployment']['Java']=='1.85') ? 'selected="selected"' : '';?>>Ver. 1.85</option>
								<option value = "1.5" <?= ($properties['deployment']['Java']=='1.5') ? 'selected="selected"' : '';?>>Ver. 1.5</option>
								</select></div><div class="stripped-right" id="deploy_java-wait"></div></div>
							</td>
						</tr>
						<tr><td align="right"></td><td></td></tr>
						<tr>
							<td align="right">Main Interface</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><select id = "DeployMainInterface" name="DeployMainInterface" class="pulse-input" onchange="AjxDropDown('DeployMainInterface', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
								<option value = "LandingPage" <?= ($properties['deployment']['Interface']=='LandingPage') ? 'selected="selected"' : '';?> >Landing Page</option>
								<option value = "IntroPage"  <?= ($properties['deployment']['Interface']=='IntroPage') ? 'selected="selected"' : '';?> >Intro Page</option>
								<option value = "MainPage" <?= ($properties['deployment']['Interface']=='MainPage') ? 'selected="selected"' : '';?> >Main Page</option>
								</select></div><div class="stripped-right" id="DeployMainInterface-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2"></td></tr>					
						<tr>
							<td align="right">
								Orientation&nbsp;<input <?= ($properties['deployment']['Orientation']['Portrait']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="DeployPortrait" name='DeployPortrait' class="pulse-text" value="Portrait" onchange="AjxCheckBox('DeployPortrait', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Portrait<div class="stripped-right" id="DeployPortrait-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['Orientation']['UpSideDown']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="DeployUSD" name='DeployUSD' class="pulse-text" value="UpSide Down" onchange="AjxCheckBox('DeployUSD', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">UpSide Down<div class="stripped-right" id="DeployUSD-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['Orientation']['LandScapeLeft']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="DeployLSL" name='DeployLSL' class="pulse-text" value="LandScape Left" onchange="AjxCheckBox('DeployLSL', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">LandScape Left<div class="stripped-right" id="DeployLSL-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['Orientation']['LandScapeRight']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="DeployLSR" name='DeployLSR' class="pulse-text" value="LandScape Right" onchange="AjxCheckBox('DeployLSR', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">LandScape Right<div class="stripped-right" id="DeployLSR-wait"></div></div></div>				
							</td>
						</tr>
						<tr><td colspan="2"></td></tr>					
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['StatusBar']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="DeployHSB" name='DeployHSB' class="pulse-text" value="true" onchange="AjxCheckBox('DeployHSB', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
								<div class="stripped"><div class="stripped-left">Hide Status Bar<div class="stripped-right" id="DeployHSB-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['FullScreen']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="DeployRFS" name='DeployRFS' class="pulse-text" value="true" onchange="AjxCheckBox('DeployRFS', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
								<div class="stripped"><div class="stripped-left">Require Full Screen<div class="stripped-right" id="DeployRFS-wait"></div></div></div>
							</td>
						</tr>
						<tr><td colspan="2"></td></tr>					
						<tr><td colspan="2">
						(Platforms&nbsp; when selected predefined default folders, files and configuration files will be added)
						</td></tr>					
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['Platform']['Local']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="PlatformLocal" name='PlatformLocal' class="pulse-text" value="PlatformLocal" onchange="AjxCheckBox('PlatformLocal', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Local<div class="stripped-right" id="PlatformLocal-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['Platform']['Web']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="PlatformWeb" name='PlatformWeb' class="pulse-text" value="PlatformWeb" onchange="AjxCheckBox('PlatformWeb', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Web<div class="stripped-right" id="PlatformWeb-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['Platform']['Smartphone']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="PlatformSmallMobile" name='DeployLSL' class="pulse-text" value="" onchange="AjxCheckBox('PlatformSmallMobile', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Small Mobile Devices (Smartphones)<div class="stripped-right" id="PlatformSmallMobile-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['Platform']['Tablet']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="PlatformMobile" name='PlatformMobile' class="pulse-text" value="PlatformMobile" onchange="AjxCheckBox('PlatformMobile', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Mobile devices (Tablets)<div class="stripped-right" id="PlatformMobile-wait"></div></div></div>				
							</td>
						</tr>
						<tr><td colspan="2"></td></tr>	
						<tr><td align="right">Backup Project</td><td></td></tr>				
						<tr>
							<td align="right">
								<input <?= ($properties['deployment']['Backup']['Enabled']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="BackupAutomatic" name='BackupAutomatic' class="pulse-text" value="BackupAutomatic" onchange="AjxCheckBox('BackupAutomatic', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Enable Automatic backup<div class="stripped-right" id="BackupAutomatic-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">Interval</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><select id = "BackupInterval" name="BackupInterval" class="pulse-input" onchange="AjxDropDown('BackupInterval', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
								<option <?= ($properties['deployment']['Backup']['Interval']=='15 min') ? 'selected="selected"' : '';?> value = "15 min">15 min</option>
								<option <?= ($properties['deployment']['Backup']['Interval']=='30 min') ? 'selected="selected"' : '';?> value = "30 min">30 min</option>
								<option <?= ($properties['deployment']['Backup']['Interval']=='60 min') ? 'selected="selected"' : '';?> value = "60 min">60 min</option>
								<option <?= ($properties['deployment']['Backup']['Interval']=='End of Morning') ? 'selected="selected"' : '';?> value = "end of morning">End of Morning</option>
								<option <?= ($properties['deployment']['Backup']['Interval']=='at lunch time') ? 'selected="selected"' : '';?> value = "at lunch time">at lunch time</option>
								<option <?= ($properties['deployment']['Backup']['Interval']=='right before dinner') ? 'selected="selected"' : '';?> value = "right before dinner">right before dinner</option>
								<option <?= ($properties['deployment']['Backup']['Interval']=='every day') ? 'selected="selected"' : '';?> value = "every day">every day</option>
								</select></div><div class="stripped-right" id="BackupInterval-wait"></div></div>
							</td>
						</tr>
					</table>
					</center>
					
				</div>
			</div>
			<!-- end of ms-selection-container-->
			<div id="bottom-spacer"></div>
		  </div>
		  <!-- end of tss-tab1-->
		  <!-- START of tss-tab2-->		
			<div id="tss-tab2" class="tss-tab">
				<!-- start of ms-selection-container-->				
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-cloud" /><label class="ms-selection-label" for="click-cloud" onclick="document.getElementById('ms-cloud-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Open Source Cloud Network</div><div style="display: inline-block;" id="cloud-wait"></div>		
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['OSCN']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="cloud" class="toggle" onchange="AjxCheckBox('cloud', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="cloud"></label>
						</div>
					</div>
					<div id="ms-cloud-contents" class="ms-slider">
						<p>Open Source Cloud Web APIs enable your WebApps to Store Data in the Cloud at the same time keeping them up to date automatically. Use Open source Cloud Services to provide your users full live and OnDemand integration across all Cloud enabled devices</p>
						<p></p>
						<p><strong>Turning On Open Source Cloud will...</strong></p>
						<ul>
						<li>Add Open Source Cloud to your ContactID</li>
						<li>Enable Open Source Cloud Options for WebApp Development</li>
						<li>Link Cloud.framework</li>
						</ul> 
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->				
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-push" /><label class="ms-selection-label" for="click-push" onclick="document.getElementById('ms-push-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Push Notifications</div><div style="display: inline-block;" id="push-wait"></div>	
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['PushNotifications']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="push" class="toggle" onchange="AjxCheckBox('push', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="push"></label>
						</div>
					</div>
					<div id="ms-push-contents" class="ms-slider" >
						<p>Push Notifications enable Realtime notifications on your device</p>
						<p></p>
						<p><strong>Turning On Push Notifications will...</strong></p>
						<ul>
						<li>Enable ContactID Push Notifications</li>
						<li>Enable Push Notification Options for WebApp Development</li>
						<li>Link PushNotifications.framework</li>
						</ul> 
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->							
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-wallet" /><label class="ms-selection-label" for="click-wallet" onclick="document.getElementById('ms-wallet-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Digital Wallet</div><div id="wallet-wait" style="display: inline-block;"></div>
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['Wallet']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="wallet" class="toggle" onchange="AjxCheckBox('wallet', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="wallet"></label>
						</div>
					</div>
					<div id="ms-wallet-contents" class="ms-slider" >
						<p>Digital Wallet allow users to easily and securely pay for physical goods, groceries, tickets and reservations, clothing or anything else you may find for sale online.   </p>
						<p></p>
						<p><strong>Turning On Digital Wallet will...</strong></p>
						<ul>
						<li>Add Digital Wallet to your ContactID</li>
						<li>Enable Digital Wallet Options for WebApp Development</li>
						<li>Link DigitalWallet.framework</li>
						</ul> 
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->				
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-games" /><label class="ms-selection-label" for="click-games" onclick="document.getElementById('ms-games-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Games Center</div><div id="games-wait" style="display: inline-block;"></div>
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['Games']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="games" class="toggle" onchange="AjxCheckBox('games', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="games"></label>
						</div>
					</div>
					<div id="ms-games-contents" class="ms-slider" >
						<p>Games Center enable players to connect with each others and interact with their friends and play head to head or view leader boards</p>
						<p></p>
						<p><strong>Turning On Games Center will...</strong></p>
						<ul>
						<li>Add Games Center to your ContactID</li>
						<li>Enable Games Center Options for WebApp Development</li>
						<li>Link GamesCenter.framework</li>
						</ul> 
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->				
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-store" /><label class="ms-selection-label" for="click-store" onclick="document.getElementById('ms-store-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Shopping Store</div><div id="store-wait" style="display: inline-block;"></div>
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['Shopping']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="store" class="toggle" onchange="AjxCheckBox('store', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="store"></label>
						</div>
					</div>
					<div id="ms-store-contents" class="ms-slider" >
						<p>Shopping Store allow users to easily and securely sell physical goods such as groceries, tickets and reservations, clothing or anything else you may find saleable online.   </p>
						<p></p>
						<p><strong>Turning On Shopping Store will...</strong></p>
						<ul>
						<li>Add Shopping Store to your ContactID</li>
						<li>Enable Shopping Store Options for WebApp Development</li>
						<li>Link ShoppingStore.framework</li>
						</ul> 
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->				
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-fhome" /><label class="ms-selection-label" for="click-fhome" onclick="document.getElementById('ms-fhome-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Family and Home</div><div id="fhome-wait" style="display: inline-block;"></div>		
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['FamilyHome']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="fhome" class="toggle" onchange="AjxCheckBox('fhome', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="fhome"></label>
						</div>
					</div>
					<div id="ms-fhome-contents" class="ms-slider" >
						<p>Family and Home enable users to interact with Family&amp;Home devices  </p>
						<p></p>
						<p><strong>Turning On Family and Home will...</strong></p>
						<ul>
						<li>Add Family and Home to your ContactID</li>
						<li>Enable Family and Home Options for WebApp Development</li>
						<li>Link FamilyHome.framework</li>
						</ul> 

					</div>
				</div>
				<!-- end of ms-selection-container-->				
				<!-- start of ms-selection-container-->				
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-health" /><label class="ms-selection-label" for="click-health" onclick="document.getElementById('ms-health-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Health</div><div id="health-wait" style="display: inline-block;"></div>
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['Health']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="health" class="toggle" onchange="AjxCheckBox('health', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="health"></label>
						</div>
					</div>
					<div id="ms-health-contents" class="ms-slider" >
						<p>Health enable users to interact with Health devices  </p>
						<p></p>
						<p><strong>Turning On Health will...</strong></p>
						<ul>
						<li>Add Health to your ContactID</li>
						<li>Enable Health Options for WebApp Development</li>
						<li>Link Health.framework</li>
						</ul> 
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->				
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-DataP" /><label class="ms-selection-label" for="click-DataP" onclick="document.getElementById('ms-DataP-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Data Protection</div><div id="DataP-wait" style="display: inline-block;"></div>
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['DataProtection']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="DataP" class="toggle" onchange="AjxCheckBox('DataP', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="DataP"></label>
						</div>
					</div>
					<div id="ms-DataP-contents" class="ms-slider" >
						<p>Data Protection allow WebApps to work sensitive data and encrypt whenever required </p>
						<p></p>
						<p><strong>Turning On Data Protection will...</strong></p>
						<ul>
						<li>Add Data Protection to your ContactID</li>
						<li>Enable Data Protection Options for WebApp Development</li>
						<li>Link DataProtection.framework</li>
						</ul> 
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->			
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-StaySafe" /><label class="ms-selection-label" for="click-StaySafe" onclick="document.getElementById('ms-StaySafe-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Stay Safe Police enforcement</div><div id="StaySafe-wait" style="display: inline-block;"></div>
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['StaySafe']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="StaySafe" class="toggle" onchange="AjxCheckBox('StaySafe', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="StaySafe"></label>
						</div>
					</div>
					<div id="ms-StaySafe-contents" class="ms-slider" >
						<p>Stay Safe Police enforcement allow WebApps to interact automatically or upon request with Police authorities for a safer web experience.</p>
						<p></p>
						<p><strong>Turning On Stay Safe Police enforcement will...</strong></p>
						<ul>
						<li>Add Stay Safe Police enforcement to your ContactID</li>
						<li>Enable Stay Safe Police enforcement Options for WebApp Development</li>
						<li>Link StaySafePolice.framework</li>
						</ul> 
						
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->			
				<div class="ms-selection-container">
						<div class="ms-selection-wrapper">
							<input type="checkbox" id="click-DNS" /><label class="ms-selection-label" for="click-DNS" onclick="document.getElementById('ms-DNS-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Domain Name Human verification</div><div id="DNS-wait" style="display: inline-block;"></div>		
				
							<div class="flipswitch">
							  <input <?= ($properties['capabilities']['DNSHuman']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="DNS" class="toggle" onchange="AjxCheckBox('DNS', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
							  <label class="l-toggle" for="DNS"></label>
						</div>
					</div>
					<div id="ms-DNS-contents" class="ms-slider" >
						<p>Domain Name Human verification assists and allow users for personal validation of domain names and its physical localisation or whereabouts.</p>
						<p></p>
						<p><strong>Turning On Stay Safe Police enforcement will...</strong></p>
						<ul>
						<li>Add Domain Name Human verification to your ContactID</li>
						<li>Enable Domain Name Human verification Options for WebApp Development</li>
						<li>Link DNSHumanVerification.framework</li>
						</ul> 
						
					</div>
				</div>
				<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->			
			<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-money" /><label class="ms-selection-label" for="click-money" onclick="document.getElementById('ms-money-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Finance and Money management</div><div id="money-wait" style="display: inline-block;"></div>
			
						<div class="flipswitch">
						  <input <?= ($properties['capabilities']['Financial']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="money" class="toggle" onchange="AjxCheckBox('money', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
						  <label class="l-toggle" for="money"></label>
					</div>
				</div>
				<div id="ms-money-contents" class="ms-slider" >
					<p>Finance and Money management tools enable user to interact with e-Banking and online banking tools seemingly and provide a framework for reports and prediction of expenses or income.</p>
					<p></p>
					<p><strong>Turning On Finance and Money management will...</strong></p>
					<ul>
					<li>Add Finance and Money management to your ContactID</li>
					<li>Enable Finance and Money management Options for WebApp Development</li>
					<li>Link FinanceMoney.framework</li>
					</ul> 
				</div>
			</div>
			<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->			
			<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-search" /><label class="ms-selection-label" for="click-search" onclick="document.getElementById('ms-search-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Search</div><div id="search-wait" style="display: inline-block;"></div>
			
						<div class="flipswitch">
						  <input <?= ($properties['capabilities']['search']=='1') ? 'checked="checked"' : '';?> type="checkbox" name="toggle" id="search" class="toggle" onchange="AjxCheckBox('search', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
						  <label class="l-toggle" for="search"></label>
					</div>
				</div>
				<div id="ms-search-contents" class="ms-slider" >
					<p>Search tools enable a user to perform searchs and provide a framework for discoverable contents, data and information.</p>
					<p></p>
					<p><strong>Turning On Search tools will...</strong></p>
					<ul>
					<li>Add Search to your ContactID</li>
					<li>Enable Search Options for WebApp Development</li>
					<li>Link search.framework</li>
					</ul> 
				</div>
			</div>
			<!-- end of ms-selection-container-->
			<div id="bottom-spacer"></div>
			</div>
			<!-- end of tss-tab2 -->
			<!-- START of tss-tab3 -->		
			<div id="tss-tab3" class="tss-tab">
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-icons-img" /><label class="ms-selection-label" for="click-icons-img" onclick="document.getElementById('ms-icons-img-contents').classList.toggle('closed');"></label>&nbsp;Graphics and User interface (GUI)
					</div>
					<div id="ms-icons-img-contents" class="ms-slider">
						<center>
						<div id="ImgIcoListCfg" class="ms-file-list">
							<p class="">Add Designs, Images, Graphics and Icon external folders here</p>
						</div>
						<table>
							<tr>
								<td><label class="" id="add-IcoImg" onclick="javascript: DlgFileOpenCfg('folders','ImgIcoListCfg');"><div class="ms-file-btn">+</div></label></td>
								<td><label class="" id="sub-IcoImg" onclick="javascript: CfgRemoveListItem('ImgIcoListCfg');"><div class="ms-file-btn">-</div></label></td>
								<td width="100%"></td>
							</tr>
						</table>
						</center>
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-embedded-bin" /><label class="ms-selection-label" for="click-embedded-bin" onclick="document.getElementById('ms-embedded-bin-contents').classList.toggle('closed'); "></label>&nbsp;Embedded Binaries
					</div>
					<div id="ms-embedded-bin-contents" class="ms-slider">
						<center>
						<div id="EmbBinListCfg" class="ms-file-list">
							<p class="">Add Embedded Binaries here</p>
						</div>
						<table>
							<tr>
								<td><label class="" id="add-IcoImg" onclick="javascript: DlgFileOpenCfg('folders','EmbBinListCfg');"><div class="ms-file-btn">+</div></label></td>
								<td><label class="" id="sub-IcoImg" onclick="javascript: CfgRemoveListItem('EmbBinListCfg');"><div class="ms-file-btn">-</div></label></td>
								<td width="100%"></td>
							</tr>
						</table>
						</center>
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-linked-lib" /><label class="ms-selection-label" for="click-linked-lib" onclick="document.getElementById('ms-linked-lib-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Linked Libraries</div><div id="LinkLibListCfg-wait" style="display: inline-block;"></div>
					</div>
					<div id="ms-linked-lib-contents" class="ms-slider">
						<center>
						<div id="LinkLibListCfg" class="ms-file-list">
						<?php
						$code='<select id ="LinkLibListCfgSelect" name="LinkLibListCfgSelect" size="7" class="ms-files" >';
						
						$empty=true;
						if (isset($properties['resources']['library'][0])):
							for ($i = 0; $i < count($properties['resources']['library']); $i++):
								$code.='<option>'.$properties['resources']['library'][$i].'</option>';
								$empty=false;
							endfor;		
						endif;
						
						if ($empty):
							$code ='<p class="">Add Linked library here</p>';
						else:
							$code.='</select>'; // is a HTML5 forms list
						endif;
						echo $code;									
						?>
						</div>
						<table>
							<tr>
								<td><label class="" id="add-IcoImg" onclick="javascript: DlgLoadSugarCfg('LinkLibListCfg');"><div class="ms-file-btn">+</div></label></td>
								<td><label class="" id="sub-IcoImg" onclick="javascript: AjxForm('LinkLibListCfg', 'system/runtime/DlgLoadSugar.server.php',['LinkLibListCfgSelect']);"><div class="ms-file-btn">-</div></label></td>
								<td width="100%"></td>
							</tr>
						</table>
						</center>
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-linked-framew" /><label class="ms-selection-label" for="click-linked-framew" onclick="document.getElementById('ms-linked-framew-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Linked Frameworks</div><div id="LinkframewListCfg-wait" style="display: inline-block;"></div>
					</div>
					<div id="ms-linked-framew-contents" class="ms-slider">
						<center>
						<div id="LinkframewListCfg" class="ms-file-list">
						<?php
						$code='<select id ="LinkframewListCfgSelect" name="LinkframewListCfgSelect" size="7" class="ms-files" >';
						
						$empty=true;
						if (isset($properties['resources']['framework'][0])):
							for ($i = 0; $i < count($properties['resources']['framework']); $i++):
								$code.='<option>'.$properties['resources']['framework'][$i].'</option>';
								$empty=false;
							endfor;		
						endif;
						
						if ($empty):
							$code ='<p class="">Add Linked framework here</p>';
						else:
							$code.='</select>'; // is a HTML5 forms list
						endif;
						echo $code;									
						?>
						</div>
						<table>
							<tr>
								<td><label class="" id="add-IcoImg" onclick="javascript: DlgLoadSugarCfg('LinkframewListCfg');"><div class="ms-file-btn">+</div></label></td>
								<td><label class="" id="sub-IcoImg" onclick="javascript: AjxForm('LinkframewListCfg', 'system/runtime/DlgLoadSugar.server.php',['LinkframewListCfgSelect']); UpdateInterfaceDependencies('system/dll/UpdateInterfaceDependencies.class');"><div class="ms-file-btn">-</div></label></td>
								<td width="100%"></td>
							</tr>
						</table>
						</center>
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-linked-widget" /><label class="ms-selection-label" for="click-linked-widget" onclick="document.getElementById('ms-linked-widget-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Linked Widgets</div><div id="LinkWidgetListCfg-wait" style="display: inline-block;"></div>
					</div>
					<div id="ms-linked-widget-contents" class="ms-slider">
						<center>
						<div id="LinkWidgetListCfg" class="ms-file-list">
							<?php
							$code='<select id ="LinkWidgetListCfgSelect" name="LinkWidgetListCfgSelect" size="7" class="ms-files" >';
							
							$empty=true;
							if (isset($properties['resources']['widget'][0])):
								for ($i = 0; $i < count($properties['resources']['widget']); $i++):
									$code.='<option>'.$properties['resources']['widget'][$i].'</option>';
									$empty=false;
								endfor;		
							endif;
							
							if ($empty):
								$code ='<p class="">Add Linked Widget here</p>';
							else:
								$code.='</select>'; // is a HTML5 forms list
							endif;
							echo $code;									
							?>
						</div>
						<table>
							<tr>
								<td><label class="" id="add-IcoImg" onclick="javascript: DlgLoadSugarCfg('LinkWidgetListCfg');"><div class="ms-file-btn">+</div></label></td>
								<td><label class="" id="sub-IcoImg" onclick="javascript: AjxForm('LinkWidgetListCfg', 'system/runtime/DlgLoadSugar.server.php',['LinkWidgetListCfgSelect']);"><div class="ms-file-btn">-</div></label></td>
								<td width="100%"></td>
							</tr>
						</table>
						</center>
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-linked-webapp" /><label class="ms-selection-label" for="click-linked-webapp" onclick="document.getElementById('ms-linked-webapp-contents').classList.toggle('closed');"></label><div style="display: inline-block;">&nbsp;Linked Web Applications</div><div id="LinkWappListCfg-wait" style="display: inline-block;"></div>
					</div>
					<div id="ms-linked-webapp-contents" class="ms-slider">
						<center>
						<div id="LinkWappListCfg" class="ms-file-list">
						<?php
						$code='<select id ="LinkWappListCfgSelect" name="LinkWappListCfgSelect" size="7" class="ms-files" >';
						
						$empty=true;
						if (isset($properties['resources']['webApp'][0])):
							for ($i = 0; $i < count($properties['resources']['webApp']); $i++):
								$code.='<option>'.$properties['resources']['webApp'][$i].'</option>';
								$empty=false;
							endfor;		
						endif;
						
						if ($empty):
							$code ='<p class="">Add Linked Web Applications here</p>';
						else:
							$code.='</select>'; // is a HTML5 forms list
						endif;
						echo $code;									
						?>
						</div>
						<table>
							<tr>
								<td><label class="" id="add-IcoImg" onclick="javascript: DlgLoadSugarCfg('LinkWappListCfg');"><div class="ms-file-btn">+</div></label></td>
								<td><label class="" id="sub-IcoImg" onclick="javascript: AjxForm('LinkWappListCfg', 'system/runtime/DlgLoadSugar.server.php',['LinkWappListCfgSelect']);"><div class="ms-file-btn">-</div></label></td>
								<td width="100%"></td>
							</tr>
						</table>
						</center>
					</div>
				</div>
				<!-- end of ms-selection-container-->
			
			</div>
			<!-- end of tss-tab3 -->
			<!-- START of tss-tab4 -->		
			<div id="tss-tab4" class="tss-tab">
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-authtypes" /><label class="ms-selection-label" for="click-authtypes" onclick="document.getElementById('ms-authtypes-contents').classList.toggle('closed');"></label>&nbsp;Authentication Types Allowed
				</div>
				<div id="ms-authtypes-contents" class="ms-slider">

						<center>
						<table>					
							<tr>
								<td align="right">
									<input <?= ($properties['safety']['AuthTypesAllowed']['web']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="AuthWebP" name='AuthWebP' class="pulse-text" value="AuthWebP" onchange="AjxCheckBox('AuthWebP', 'system/runtime/ProjCfgFilesFolders.server.php','post');" />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">Web Password<div class="stripped-right" id="AuthWebP-wait"></div></div></div>
								</td>
							</tr>
							<tr>
								<td align="right">
									<input <?= ($properties['safety']['AuthTypesAllowed']['sms']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="AuthMPSMS" name='AuthMPSMS' class="pulse-text" value="AuthMPSMS" onchange="AjxCheckBox('AuthMPSMS', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">Mobile Phone SMS<div class="stripped-right" id="AuthMPSMS-wait"></div></div></div>				
								</td>
							</tr>
							<tr>
								<td align="right">
									<input <?= ($properties['safety']['AuthTypesAllowed']['CodeGen']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="AuthSPCG" name='AuthSPCG' class="pulse-text" value="AuthSPCG" onchange="AjxCheckBox('AuthSPCG', 'system/runtime/ProjCfgFilesFolders.server.php','post');" />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">SmartPhone Code Generator<div class="stripped-right" id="AuthSPCG-wait"></div></div></div>				
								</td>
							</tr>
							<tr>
								<td align="right">
									<input <?= ($properties['safety']['AuthTypesAllowed']['LiveMD5']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="AuthLRC" name='AuthLRC' class="pulse-text" value="LandScape Right" onchange="AjxCheckBox('AuthLRC', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">Live Rendered Code MD5<div class="stripped-right" id="AuthLRC-wait"></div></div></div>				
								</td>
							</tr>	
						</table>
						</center>
				</div>
			</div>
			<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-authkeys" /><label class="ms-selection-label" for="click-authkeys" onclick="document.getElementById('ms-authkeys-contents').classList.toggle('closed');"></label>&nbsp;Authentication Keys
				</div>
				<div id="ms-authkeys-contents" class="ms-slider">

						<center>
						<table>					

							<tr>
								<td align="right" valign="top">
								Project internal Key
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">
									<textarea style="resize: none; height: 200px; width: 100%;" rows="4" cols="50" id="ProjIntKey" name='ProjIntKey' class="pulse-text" onblur="AjxInput('ProjIntKey', 'system/runtime/ProjCfgFilesFolders.server.php','post');">Add key here</textarea>
								<div class="stripped-right" id="ProjIntKey-wait"></div></div></div>				
								</td>
							</tr>
							<tr><td colspan="2"></td></tr>
							<tr>
								<td align="right" valign="top">
								Public Sharing Key
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">
									<textarea style="resize: none; height: 200px; width: 100%;" rows="4" cols="50" id="ProjPubKey" name='ProjPubKey' class="pulse-text" onblur="AjxInput('ProjPubKey', 'system/runtime/ProjCfgFilesFolders.server.php','post');">Add key here</textarea>
								<div class="stripped-right" id="ProjPubKey-wait"></div></div></div>				
								</td>
							</tr>

						</table>
						</center>

				</div>
			</div>
			<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-share" /><label class="ms-selection-label" for="click-share" onclick="document.getElementById('ms-share-contents').classList.toggle('closed');"></label>&nbsp;Sharing
				</div>
				<div id="ms-share-contents" class="ms-slider">
					<center>
					<table>
						<tr><td colspan="2"></td></tr>					
						<tr>
							<td align="right">
								<input <?= ($properties['safety']['Sharing']['Enabled']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="SafetySharing" name='SafetySharing' class="pulse-text" value="SafetySharing" onchange="AjxCheckBox('SafetySharing', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Enable Contents Sharing<div class="stripped-right" id="SafetySharing-wait"></div></div></div>				
							</td>
						</tr>
					</table>
					</center>
				</div>
			</div>
			<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-assocdomain" /><label class="ms-selection-label" for="click-assocdomain" onclick="document.getElementById('ms-assocdomain-contents').classList.toggle('closed');"></label>&nbsp;Associated Domains
				</div>
				<div id="ms-assocdomain-contents" class="ms-slider">
					<center>
					<div id="AssocDomainsListCfg" class="ms-file-list">
						<p class="">Add associated domains here</p>
					</div>
					<table>
						<tr>
							<td><label class="" id="add-IcoImg" onclick="javascript: DlgFileOpenCfg('domain','AssocDomainsListCfg');"><div class="ms-file-btn">+</div></label></td>
							<td><label class="" id="sub-IcoImg" onclick="javascript: CfgRemoveListItem('AssocDomainsListCfg');"><div class="ms-file-btn">-</div></label></td>
							<td width="100%"></td>
						</tr>
					</table>
					</center>
					
				</div>
			</div>
			<!-- end of ms-selection-container-->


			<div id="bottom-spacer"></div>
			</div><!-- end of tss-tab4-->
		
			<div id="tss-tab5" class="tss-tab">
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-engine" /><label class="ms-selection-label" for="click-engine" onclick="document.getElementById('ms-engine-contents').classList.toggle('closed');"></label>&nbsp;Engine
					</div>

					<div id="ms-linked-webapp-contents" class="ms-slider">
						<center>
						<div id="EngineListCfg" class="ms-file-list">
							<p class="">Add Engine PHP compiler here</p>
						</div>
						<table>
							<tr>
								<td><label class="" id="add-IcoImg" onclick="javascript: DlgFileOpenCfg('folders','EngineListCfg');"><div class="ms-file-btn">+</div></label></td>
								<td><label class="" id="sub-IcoImg" onclick="javascript: CfgRemoveListItem('EngineListCfg');"><div class="ms-file-btn">-</div></label></td>
								<td width="100%"></td>
							</tr>
						</table>
						</center>

					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-build-opt" /><label class="ms-selection-label" for="click-build-opt" onclick="document.getElementById('ms-build-opt-contents').classList.toggle('closed');"></label>&nbsp;Build Options
					</div>
					<div id="ms-build-opt-contents" class="ms-slider">
					
					<center>
					<table>
						<tr><td colspan="2"></td></tr>					
						<tr>
							<td align="right">
								SASS&nbsp;<input <?= ($properties['Compiler']['options']['sass']['compress']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="BuildSASS-Compress" name='BuildSASS-Compress' class="pulse-text" value="BuildSASS-Compress" onchange="AjxCheckBox('BuildSASS-Compress', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Compress Files<div class="stripped-right" id="BuildSASS-Compress-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['Compiler']['options']['sass']['merge']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="BuildSASS-Merge" name='BuildSASS-Merge' class="pulse-text" value="BuildSASS-Compress" onchange="AjxCheckBox('BuildSASS-Merge', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Merge Into the same file<div class="stripped-right" id="BuildSASS-Merge-wait"></div></div></div>				
							</td>
						</tr>
						<tr><td colspan="2"></td></tr>
						<tr>
							<td align="right">
								CSS&nbsp;<input <?= ($properties['Compiler']['options']['css']['compress']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="BuildCSS-Compress" name='BuildCSS-Compress' class="pulse-text" value="BuildCSS-Compress" onchange="AjxCheckBox('BuildCSS-Compress', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
								<div class="stripped"><div class="stripped-left">Compress Files<div class="stripped-right" id="BuildCSS-Compress-wait"></div></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['Compiler']['options']['css']['merge']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="BuildCSS-Merge" name='BuildCSS-Merge' class="pulse-text" value="BuildCSS-Merge" onchange="AjxCheckBox('BuildCSS-Merge', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Merge into the same file<div class="stripped-right" id="BuildCSS-Merge-wait"></div></div></div>				
							</td>
						</tr>
						<tr><td colspan="2"></td></tr>					
						<tr>
							<td align="right">
								Javascript&nbsp;<input <?= ($properties['Compiler']['options']['javascript']['compress']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="BuildJs-Compress" name='BuildJs-Compress' class="pulse-text" value="BuildJs-Compress" onchange="AjxCheckBox('BuildJs-Compress', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
								<div class="stripped"><div class="stripped-left">Compress Files<div class="stripped-right" id="BuildJs-Compress-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['Compiler']['options']['javascript']['merge']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="BuildJs-Merge" name='BuildJs-Merge' class="pulse-text" value="BuildJs-Merge" onchange="AjxCheckBox('BuildJs-Merge', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
								<div class="stripped"><div class="stripped-left">Merge into the same file<div class="stripped-right" id="BuildJs-Merge-wait"></div></div></div>
							</td>
						</tr>
						</table>
						</center>
					</div>
				</div>
				<!-- end of ms-selection-container--> 
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-build-phases" /><label class="ms-selection-label" for="click-build-phases" onclick="document.getElementById('ms-build-phases-contents').classList.toggle('closed');"></label>&nbsp;Build Phases
					</div>
					<div id="ms-build-phases-contents" class="ms-slider">

						<center>
						<table>
							<tr><td colspan="2"></td></tr>					
							<tr>
								<td align="right">
									<input <?= ($properties['Compiler']['BuildPhases']['beta']=='1') ? 'checked="checked"' : '';?>type='checkbox' id="phase_beta" name='phase_beta' class="pulse-text" value="beta" onchange="AjxCheckBox('phase_beta', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">Enable Beta<div class="stripped-right" id="phase_beta-wait"></div></div></div>				
								</td>
							</tr>
							<tr>
								<td align="right">
									<input <?= ($properties['Compiler']['BuildPhases']['alfa']=='1') ? 'checked="checked"' : '';?>type='checkbox' id="phase_alfa" name='phase_alfa' class="pulse-text" value="alfa" onchange="AjxCheckBox('phase_alfa', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">Enable Alfa<div class="stripped-right" id="phase_alfa-wait"></div></div></div>				
								</td>
							</tr>
							<tr>
								<td align="right">
									<input <?= ($properties['Compiler']['BuildPhases']['rc']=='1') ? 'checked="checked"' : '';?>type='checkbox' id="phase_rc" name='phase_rc' class="pulse-text" value="rc" onchange="AjxCheckBox('phase_rc', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">Enable Release Candidate<div class="stripped-right" id="phase_rc-wait"></div></div></div>				
								</td>
							</tr>
							<tr>
								<td align="right">
									<input <?= ($properties['Compiler']['BuildPhases']['final']=='1') ? 'checked="checked"' : '';?>type='checkbox' id="phase_final" name='phase_final' class="pulse-text" value="final" onchange="AjxCheckBox('phase_final', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">Enable Final<div class="stripped-right" id="phase_final-wait"></div></div></div>				
								</td>
							</tr>
						</table>
						</center>


					</div>
				</div>
				<!-- end of ms-selection-container--> 
			<div id="bottom-spacer"></div>
			</div>
			<!-- end of tss-tab5-->
			<!-- start of tss-tab6-->
			<div id="tss-tab6" class="tss-tab">
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-dev-locations" /><label class="ms-selection-label" for="click-dev-locations" onclick="document.getElementById('ms-dev-locations-contents').classList.toggle('closed');"></label>&nbsp;Override Default root folder name
					</div>
					<div id="ms-dev-locations-contents" class="ms-slider">

					<center>
					<table>
						<tr>
							<td align="right" width="300px">Local</td>
							<td align="left" width="300px">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['development']['folders']['local'] ;?>" type='text' id="override_name_local" class="pulse-text" onblur="AjxInput('override_name_local', 'system/runtime/ProjCfgFilesFolders.server.php','post');" name='override_name_local' /></div><div class="stripped-right" id="override_name_local-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Web</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['development']['folders']['web'] ;?>" type='text' id="override_name_web" class="pulse-text" onblur="AjxInput('override_name_web', 'system/runtime/ProjCfgFilesFolders.server.php','post');" name='override_name_web' /></div><div class="stripped-right" id="override_name_web-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Mobile</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['development']['folders']['mobile'] ;?>" type='text' id="override_name_mobile" class="pulse-text" onblur="AjxInput('override_name_mobile', 'system/runtime/ProjCfgFilesFolders.server.php','post');" name='override_name_mobile' /></div><div class="stripped-right" id="override_name_mobile-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Tablet</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['development']['folders']['tablet'] ;?>" type='text' id="override_name_tablet" class="pulse-text" onblur="AjxInput('override_name_tablet', 'system/runtime/ProjCfgFilesFolders.server.php','post');" name='override_name_tablet' /></div><div class="stripped-right" id="override_name_tablet-wait"></div></div>
							</td>
						</tr>
					</table>
					</center>

					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-dev-versions" /><label class="ms-selection-label" for="click-dev-versions" onclick="document.getElementById('ms-dev-versions-contents').classList.toggle('closed');"></label>&nbsp;Versioning
					</div>
					<div id="ms-dev-versions-contents" class="ms-slider">
					
						<center>
						<table>					
							<tr>
								<td align="right">
									<input <?= ($properties['development']['versioning']=='1') ? 'checked="checked"' : '';?>  type='checkbox' id="FileVersioning" name='FileVersioning' class="pulse-text" value="FileVersioning" onchange="AjxCheckBox('FileVersioning', 'system/runtime/ProjCfgFilesFolders.server.php','post');" />
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">Enable File Versioning<div class="stripped-right" id="FileVersioning-wait"></div></div></div>
								</td>
							</tr>
							<tr>
								<td align="right">
									Distribution Type								
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left"><select id = "VersioningDistroType" name="VersioningDistroType" class="pulse-input" onchange="AjxDropDown('VersioningDistroType', 'system/runtime/ProjCfgFilesFolders.server.php','post');">
									<option <?= ($properties['development']['Distribution']=='General Public License') ? 'selected="selected"' : '';?> value = "General Public License">General Public License</option>
									<option <?= ($properties['development']['Distribution']=='Creative Commons') ? 'selected="selected"' : '';?> value = "Creative Commons">Creative Commons</option>
									<option <?= ($properties['development']['Distribution']=='Copyright - all rights reserved') ? 'selected="selected"' : '';?> value = "Copyright - all rights reserved">Copyright - all rights reserved</option>
									<option <?= ($properties['development']['Distribution']=='Academic Free License') ? 'selected="selected"' : '';?> value = "Academic Free License">Academic Free License</option>
									<option <?= ($properties['development']['Distribution']=='European Union Public License') ? 'selected="selected"' : '';?> value = "European Union Public License">European Union Public License</option>
									<option <?= ($properties['development']['Distribution']=='Educational Community License') ? 'selected="selected"' : '';?> value = "Educational Community License">Educational Community License</option>
									</select></div><div class="stripped-right" id="VersioningDistroType-wait"></div></div>	
									<br />
									<div class="stripped-left"><a class="TextS2" href="https://opensource.org/licenses/alphabetical" target="_blank">Check types of Open Source licensing here</a></div>	
								</td>
							</tr>
							<tr>
								<td align="right" valign="top">
								Custom header
								</td>
								<td align="left">
								<div class="stripped"><div class="stripped-left">
									<textarea style="resize: none; height: 200px; width: 100%;" rows="4" cols="50" id="VersioningCustomTxt" name='VersioningCustomTxt' class="pulse-text" onblur="AjxInput('VersioningCustomTxt', 'system/runtime/ProjCfgFilesFolders.server.php','post');"><?=$test=$properties['development']['CustomText']=='' ? 'Add you versioning text here' : $properties['development']['CustomText'];?></textarea>
								<div class="stripped-right" id="VersioningCustomTxt-wait"></div></div></div>				
								</td>
							</tr>

						</table>
						</center>
					
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<!-- start of ms-selection-container-->
				<div class="ms-selection-container">
					<div class="ms-selection-wrapper">
						<input type="checkbox" id="click-dev-repo" /><label class="ms-selection-label" for="click-dev-repo" onclick="document.getElementById('ms-dev-repo-contents').classList.toggle('closed');"></label>&nbsp;Repository
					</div>
					<div id="ms-dev-repo-contents" class="ms-slider">
					<center>
					<table>
						<tr><td colspan="2"></td></tr>					
						<tr>
							<td align="right">
								<input <?= ($properties['development']['repository']['Github']=='1') ? 'checked="checked"' : '';?>  type='checkbox' id="Github-enabler" name='Github-enabler' class="pulse-text" value="Github-enabler" onchange="AjxCheckBox('Github-enabler', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Enable GitHub<div class="stripped-right" id="Github-enabler-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['development']['repository']['SVN']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="SVN-enabler" name='SVN-enabler' class="pulse-text" value="SVN-enabler" onchange="AjxCheckBox('SVN-enabler', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">Enable SVN<div class="stripped-right" id="SVN-enabler-wait"></div></div></div>				
							</td>
						</tr>
					</table>
					</center>
					</div>
				</div>
				<!-- end of ms-selection-container-->
				<div id="bottom-spacer"></div>
			</div>
			<!-- end of tss-tab6-->
			<!-- start of tss-tab7-->
		<div id="tss-tab7" class="tss-tab">
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-hosting" /><label class="ms-selection-label" for="click-hosting" onclick="document.getElementById('ms-hosting-contents').classList.toggle('closed');"></label>&nbsp;Cloud Hosting
				</div>
				<div id="ms-hosting-contents" class="ms-slider">

					<center>
					<table>
						<tr><td align="right">For .Local WebApp</td><td></td></tr>
						<tr>
							<td align="right">Address</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="hosting-local-addr"  name='hosting-local-addr' class="pulse-text" value="<?=$test=$properties['server']['hosting']['local']['addr']=='' ? 'localhost:80' : $properties['server']['hosting']['local']['addr'];?>" onblur="AjxInput('hosting-local-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-local-addr-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['server']['hosting']['local']['ftp']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="hosting-local-ftp" name='hosting-local-ftp' class="pulse-text" value="hosting-local-ftp" onchange="AjxCheckBox('hosting-local-ftp', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">FTP enabled<div class="stripped-right" id="hosting-local-ftp-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right" width="300px">User</td>
							<td align="left" width="300px">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['local']['user'];?>" type='text' id="hosting-local-user" name='hosting-local-user' class="pulse-text" onblur="AjxInput('hosting-local-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-local-user-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Pwd</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['local']['pwd'];?>" type='text' id="hosting-local-pwd" name='hosting-local-pwd' class="pulse-text" onblur="AjxInput('hosting-local-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-local-pwd-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">ftp port</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['local']['port'];?>" type='text' id="hosting-local-port" name='hosting-local-port'  class="pulse-text" onblur="AjxInput('hosting-local-port', 'system/runtime/ProjCfgFilesFolders.server.php','post');"/></div><div class="stripped-right" id="hosting-local-port-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Remote path</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['local']['remotePath'];?>" type='text' name='hosting-local-remotePath' id="hosting-local-remotePath" class="pulse-text" onblur="AjxInput('hosting-local-remotePath', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-local-remotePath-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>
						<tr><td align="right">For .Web WebApp</td><td></td></tr>
						<tr>
							<td align="right">Address</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="hosting-web-addr"  name='hosting-web-addr' class="pulse-text" value="<?=$test=$properties['server']['hosting']['web']['addr']=='' ? 'localhost:80' : $properties['server']['hosting']['web']['addr'];?>" onblur="AjxInput('hosting-web-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-web-addr-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['server']['hosting']['web']['ftp']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="hosting-web-ftp" name='hosting-web-ftp' class="pulse-text" value="hosting-web-ftp" onchange="AjxCheckBox('hosting-web-ftp', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">FTP enabled<div class="stripped-right" id="hosting-web-ftp-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right" width="300px">User</td>
							<td align="left" width="300px">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['web']['user'];?>" type='text' id="hosting-web-user" name='hosting-web-user' class="pulse-text" onblur="AjxInput('hosting-web-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-web-user-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Pwd</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['web']['pwd'];?>" type='text' id="hosting-web-pwd" name='hosting-web-pwd' class="pulse-text" onblur="AjxInput('hosting-web-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-web-pwd-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">ftp port</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['web']['port'];?>" type='text' id="hosting-web-port" name='hosting-web-port'  class="pulse-text" onblur="AjxInput('hosting-web-port', 'system/runtime/ProjCfgFilesFolders.server.php','post');"/></div><div class="stripped-right" id="hosting-web-port-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Remote path</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['web']['remotePath'];?>" type='text' name='hosting-web-remotePath' id="hosting-web-remotePath" class="pulse-text" onblur="AjxInput('hosting-web-remotePath', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-web-remotePath-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>
						<tr><td align="right">For .Mobile WebApp</td><td></td></tr>
						<tr>
							<td align="right">Address</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="hosting-mobile-addr"  name='hosting-mobile-addr' class="pulse-text" value="<?=$test=$properties['server']['hosting']['mobile']['addr']=='' ? 'localhost:80' : $properties['server']['hosting']['mobile']['addr'];?>" onblur="AjxInput('hosting-mobile-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-mobile-addr-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['server']['hosting']['mobile']['ftp']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="hosting-mobile-ftp" name='hosting-mobile-ftp' class="pulse-text" value="hosting-mobile-ftp" onchange="AjxCheckBox('hosting-mobile-ftp', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">FTP enabled<div class="stripped-right" id="hosting-mobile-ftp-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right" width="300px">User</td>
							<td align="left" width="300px">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['mobile']['user'];?>" type='text' id="hosting-mobile-user" name='hosting-mobile-user' class="pulse-text" onblur="AjxInput('hosting-mobile-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-mobile-user-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Pwd</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['mobile']['pwd'];?>" type='text' id="hosting-mobile-pwd" name='hosting-mobile-pwd' class="pulse-text" onblur="AjxInput('hosting-mobile-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-mobile-pwd-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">ftp port</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['mobile']['port'];?>" type='text' id="hosting-mobile-port" name='hosting-mobile-port'  class="pulse-text" onblur="AjxInput('hosting-mobile-port', 'system/runtime/ProjCfgFilesFolders.server.php','post');"/></div><div class="stripped-right" id="hosting-mobile-port-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Remote path</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['mobile']['remotePath'];?>" type='text' name='hosting-mobile-remotePath' id="hosting-mobile-remotePath" class="pulse-text" onblur="AjxInput('hosting-mobile-remotePath', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-mobile-remotePath-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>
						<tr><td align="right">For .Tablet WebApp</td><td></td></tr>
						<tr>
							<td align="right">Address</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="hosting-tablet-addr"  name='hosting-tablet-addr' class="pulse-text" value="<?=$test=$properties['server']['hosting']['tablet']['addr']=='' ? 'localhost:80' : $properties['server']['hosting']['tablet']['addr'];?>" onblur="AjxInput('hosting-tablet-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-tablet-addr-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">
								<input <?= ($properties['server']['hosting']['tablet']['ftp']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="hosting-tablet-ftp" name='hosting-tablet-ftp' class="pulse-text" value="hosting-tablet-ftp" onchange="AjxCheckBox('hosting-tablet-ftp', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
							</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left">FTP enabled<div class="stripped-right" id="hosting-tablet-ftp-wait"></div></div></div>				
							</td>
						</tr>
						<tr>
							<td align="right" width="300px">User</td>
							<td align="left" width="300px">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['tablet']['user'];?>" type='text' id="hosting-tablet-user" name='hosting-tablet-user' class="pulse-text" onblur="AjxInput('hosting-tablet-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-tablet-user-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Pwd</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['tablet']['pwd'];?>" type='text' id="hosting-tablet-pwd" name='hosting-tablet-pwd' class="pulse-text" onblur="AjxInput('hosting-tablet-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-tablet-pwd-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">ftp port</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['tablet']['port'];?>" type='text' id="hosting-tablet-port" name='hosting-tablet-port'  class="pulse-text" onblur="AjxInput('hosting-tablet-port', 'system/runtime/ProjCfgFilesFolders.server.php','post');"/></div><div class="stripped-right" id="hosting-tablet-port-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Remote path</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['tablet']['remotePath'];?>" type='text' name='hosting-tablet-remotePath' id="hosting-tablet-remotePath" class="pulse-text" onblur="AjxInput('hosting-tablet-remotePath', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-tablet-remotePath-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>					
					</table>
					</center>

				</div>
			</div>
			<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-apache" /><label class="ms-selection-label" for="click-apache" onclick="document.getElementById('ms-apache-contents').classList.toggle('closed');"></label>&nbsp;Apache Server
				</div>
				<div id="ms-apache-contents" class="ms-slider">
					<?php
					echo 'Server running: '.apache_get_version();
					?>
				</div>
			</div>
			<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-script-lang" /><label class="ms-selection-label" for="click-script-lang" onclick="document.getElementById('ms-script-lang-contents').classList.toggle('closed');"></label>&nbsp;Scripting Languages
				</div>
				<div id="ms-script-lang-contents" class="ms-slider">
						<?php
						echo 'PHP running: '.phpversion();
						?>
				</div>
			</div>
			<!-- end of ms-selection-container-->
			<!-- start of ms-selection-container-->
			<div class="ms-selection-container">
				<div class="ms-selection-wrapper">
					<input type="checkbox" id="click-db-server" /><label class="ms-selection-label" for="click-db-server" onclick="document.getElementById('ms-db-server-contents').classList.toggle('closed');"></label>&nbsp;Database Server
				</div>
				<div id="ms-db-server-contents" class="ms-slider">
					<center>
					<table>
						<tr><td align="right">For .Local DB</td><td></td></tr>
						<tr>
							<td align="right">Address</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="DB-local-addr"  name='DB-local-addr' class="pulse-text" value="<?=$test=$properties['server']['database']['local']['addr']=='' ? 'localhost:80' : $properties['server']['database']['local']['addr'];?>" onblur="AjxInput('DB-local-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-local-addr-wait"></div></div>
							</td>
						</tr>

						<tr>
							<td align="right">Username</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$test=$properties['server']['database']['local']['user'];?>" type='text' id="DB-local-user"  name='DB-local-user' class="pulse-text" onblur="AjxInput('DB-local-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-local-user-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Password</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$test=$properties['server']['database']['local']['pwd'];?>" type='text' id="DB-local-pwd" name='DB-local-pwd' class="pulse-text" onblur="AjxInput('DB-local-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-local-pwd-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>

						<tr><td align="right">For .Web DB</td><td></td></tr>
						<tr>
							<td align="right">Address</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="DB-web-addr"  name='DB-web-addr' class="pulse-text" value="<?=$test=$properties['server']['database']['web']['addr']=='' ? 'localhost:80' : $properties['server']['database']['web']['addr'];?>" onblur="AjxInput('DB-web-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-web-addr-wait"></div></div>
							</td>
						</tr>

						<tr>
							<td align="right">Username</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$test=$properties['server']['database']['web']['user'];?>" type='text' id="DB-web-user"  name='DB-web-user' class="pulse-text" onblur="AjxInput('DB-web-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-web-user-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Password</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$test=$properties['server']['database']['web']['pwd'];?>" type='text' id="DB-web-pwd" name='DB-web-pwd' class="pulse-text" onblur="AjxInput('DB-web-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-web-pwd-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>
						
						<tr><td align="right">For .Mobile DB</td><td></td></tr>
						<tr>
							<td align="right">Address</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="DB-mobile-addr"  name='DB-mobile-addr' class="pulse-text" value="<?=$test=$properties['server']['database']['mobile']['addr']=='' ? 'localhost:80' : $properties['server']['database']['mobile']['addr'];?>" onblur="AjxInput('DB-mobile-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-mobile-addr-wait"></div></div>
							</td>
						</tr>

						<tr>
							<td align="right">Username</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$test=$properties['server']['database']['mobile']['user'];?>" type='text' id="DB-mobile-user"  name='DB-mobile-user' class="pulse-text" onblur="AjxInput('DB-mobile-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-mobile-user-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Password</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$test=$properties['server']['database']['mobile']['pwd'];?>" type='text' id="DB-mobile-pwd" name='DB-mobile-pwd' class="pulse-text" onblur="AjxInput('DB-mobile-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-mobile-pwd-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>

						<tr><td align="right">For .Tablet DB</td><td></td></tr>
						<tr>
							<td align="right">Address</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input type='text' id="DB-tablet-addr"  name='DB-tablet-addr' class="pulse-text" value="<?=$test=$properties['server']['database']['tablet']['addr']=='' ? 'localhost:80' : $properties['server']['database']['tablet']['addr'];?>" onblur="AjxInput('DB-tablet-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-tablet-addr-wait"></div></div>
							</td>
						</tr>

						<tr>
							<td align="right">Username</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$test=$properties['server']['database']['tablet']['user'];?>" type='text' id="DB-tablet-user"  name='DB-tablet-user' class="pulse-text" onblur="AjxInput('DB-tablet-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-tablet-user-wait"></div></div>
							</td>
						</tr>
						<tr>
							<td align="right">Password</td>
							<td align="left">
							<div class="stripped"><div class="stripped-left"><input value="<?=$test=$properties['server']['database']['tablet']['pwd'];?>" type='text' id="DB-tablet-pwd" name='DB-tablet-pwd' class="pulse-text" onblur="AjxInput('DB-tablet-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="DB-tablet-pwd-wait"></div></div>
							</td>
						</tr>
						<tr><td colspan="2" ></td></tr>
								
						<tr><td align="left"><div class="stripped"></div><div class="stripped-left">Type of DB installed</div><div class="stripped-right" id="DBListCfg-wait"></div></div></td><td></td></tr>
						<tr>
						<td colspan="2">
							<center>
							<div id="DBListCfg" class="ms-file-list">
								<?php
								$code='<select id ="DBListCfgSelect" name="DBListCfgSelect" size="7" class="ms-files" >';
								
								$where=array('local','web','mobile','tablet');
								$empty=true;
								for ($j = 0; $j < count($where); $j++):	
									if (isset($properties['server']['database'][$where[$j]]['type'][0])):
										for ($i = 0; $i < count($properties['server']['database'][$where[$j]]['type']); $i++):
											$code.='<option> .'.$where[$j].' ('.$properties['server']['database'][$where[$j]]['type'][$i].' '.$properties['server']['database'][$where[$j]]['version'][$i].')</option>';
											$empty=false;
										endfor;		
									endif;
								endfor;
								
								if ($empty):
									$code ='<p class="">No Database Types Configured</p>';
								else:
									$code.='</select>'; // is a HTML5 forms list
								endif;
								echo $code;									
								?>
							</div>

							<div class="stripped"><div class="stripped-left"></div><div class="stripped-right" id="DBTypeRemove-save">
							<a href="#" onclick="javascript: AjxForm('DBListCfg', 'system/runtime/ProjCfgFilesFolders.server.php',['DBListCfgSelect']);" class="fa fa-trash-o"></a>
							</div></div>
		
						</td>
						</tr>
						<tr><td colspan="2"></td></tr>
						<tr>
						<td align="left">
						<div class="stripped"><div class="stripped-left">
						Add DB types here for
						<select id = "DBTypeAdd" name="DBTypeAdd" class="pulse-input" >
							<option value = ".Local">.Local</option>
							<option value = ".Web">.Web</option>
							<option value = ".Mobile">.Mobile</option>
							<option value = ".Tablet">.Tablet</option>
							</select>
							</div>
							<div class="stripped-right" id="DBTypeAdd-wait"></div>
							</div>
						</td>
						<td></td>
						</tr>
							<tr >
								<td align="right"  style="border-top: 1px solid #cccccc;">
								<input type='checkbox' id="DBTypeAddMySQL" name='DBTypeAddMySQL' class="pulse-text"  />&nbsp;MySQL
								</td>
								<td align="left" style="border-top: 1px solid #cccccc;">
		
									<select id = "DBTypeAddMySQLVersion" name="DBTypeAddMySQLVersion" class="pulse-input">
										<option value = "Ver. 5.6">Ver. 5.6</option>
										<option value = "Ver. 5.5">Ver. 5.5</option>
										<option value = "Ver. 5.1">Ver. 5.1</option>
										<option value = "Ver. 5.0">Ver. 5.0</option>
									</select>				
								</td>
							</tr>
							<tr>
								<td align="right" >
								<input type='checkbox' id="DBTypeAddMsSQL" name='DBTypeAddMsSQL' class="pulse-text"  />&nbsp;MsSQL
								</td>
								<td align="left" >
									<select id = "DBTypeAddMsSQLVersion" name="DBTypeAddMsSQLVersion" class="pulse-input" >
										<option value = "Ver. 2016">Ver. 2016</option>
										<option value = "Ver. 2014">Ver. 2014</option>
										<option value = "Ver. 2012">Ver. 2012</option>
										<option value = "Ver. 2008R2">Ver. 2008R2</option>
									</select>				
								</td>
							</tr>
							<tr>
								<td align="right" width="500px" style="border-bottom: 1px solid #cccccc;">
								<input type='checkbox' id="DBTypeAddPostgre" name='DBTypeAddPostgre' class="pulse-text"  />&nbsp;PostgreSQL
								</td>
								<td align="left" width="300px" style="border-bottom: 1px solid #cccccc;">
									<select id = "DBTypeAddPostgreVersion" name="DBTypeAddPostgreVersion" class="pulse-input" >
										<option value = "Ver. 9.5">Ver. 9.5</option>
										<option value = "Ver. 9.4">Ver. 9.4</option>
										<option value = "Ver. 9.3">Ver. 9.3</option>
										<option value = "Ver. 9.2">Ver. 9.2</option>
										</select>					
								</td>
							</tr>
							<tr>
								<td><a class="TextS2" href="https://www.g2crowd.com/products/mysql/competitors/alternatives" target="_blank">Check types of DBs out there</a></td>
								<td align="right">
								<div class="stripped"><div class="stripped-left"></div><div class="stripped-right" id="DBTypeAdd-save">
								<a href="#" onclick="javascript: AjxForm('DBListCfg', 'system/runtime/ProjCfgFilesFolders.server.php',['DBTypeAdd','DBTypeAddMySQLVersion','DBTypeAddMsSQLVersion','DBTypeAddPostgreVersion','DBTypeAddPostgre','DBTypeAddMsSQL','DBTypeAddMySQL']);" class="fa fa-floppy-o"></a>
								</div></div>
								</td>
							</tr>
							
					</table>
					</center>
				</div>
			</div>
			<!-- end of ms-selection-container-->
						<!-- start of ms-selection-container-->
						<div class="ms-selection-container">
							<div class="ms-selection-wrapper">
								<input type="checkbox" id="click-webHD" /><label class="ms-selection-label" for="click-webHD" onclick="document.getElementById('ms-webHD-contents').classList.toggle('closed');"></label>&nbsp;Cloud Drive access
							</div>
							<div id="ms-webHD-contents" class="ms-slider">
			
								<center>
								<table>
									<tr><td align="right">DropBox</td><td></td></tr>
									<tr>
										<td align="right">Address</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left"><input type='text' id="hosting-local-addr"  name='hosting-local-addr' class="pulse-text" value="<?=$test=$properties['server']['hosting']['local']['addr']=='' ? 'localhost:80' : $properties['server']['hosting']['local']['addr'];?>" onblur="AjxInput('hosting-local-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-local-addr-wait"></div></div>
										</td>
									</tr>
									<tr>
										<td align="right">
											<input <?= ($properties['server']['hosting']['local']['ftp']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="hosting-local-ftp" name='hosting-local-ftp' class="pulse-text" value="hosting-local-ftp" onchange="AjxCheckBox('hosting-local-ftp', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
										</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left">FTP enabled<div class="stripped-right" id="hosting-local-ftp-wait"></div></div></div>				
										</td>
									</tr>
									<tr>
										<td align="right" width="300px">User</td>
										<td align="left" width="300px">
										<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['local']['user'];?>" type='text' id="hosting-local-user" name='hosting-local-user' class="pulse-text" onblur="AjxInput('hosting-local-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-local-user-wait"></div></div>
										</td>
									</tr>
									<tr>
										<td align="right">Pwd</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['local']['pwd'];?>" type='text' id="hosting-local-pwd" name='hosting-local-pwd' class="pulse-text" onblur="AjxInput('hosting-local-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-local-pwd-wait"></div></div>
										</td>
									</tr>
									<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>
									<tr><td align="right">iCloud</td><td></td></tr>
									<tr>
										<td align="right">Address</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left"><input type='text' id="hosting-web-addr"  name='hosting-web-addr' class="pulse-text" value="<?=$test=$properties['server']['hosting']['web']['addr']=='' ? 'localhost:80' : $properties['server']['hosting']['web']['addr'];?>" onblur="AjxInput('hosting-web-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-web-addr-wait"></div></div>
										</td>
									</tr>
									<tr>
										<td align="right">
											<input <?= ($properties['server']['hosting']['web']['ftp']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="hosting-web-ftp" name='hosting-web-ftp' class="pulse-text" value="hosting-web-ftp" onchange="AjxCheckBox('hosting-web-ftp', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
										</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left">FTP enabled<div class="stripped-right" id="hosting-web-ftp-wait"></div></div></div>				
										</td>
									</tr>
									<tr>
										<td align="right" width="300px">User</td>
										<td align="left" width="300px">
										<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['web']['user'];?>" type='text' id="hosting-web-user" name='hosting-web-user' class="pulse-text" onblur="AjxInput('hosting-web-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-web-user-wait"></div></div>
										</td>
									</tr>
									<tr>
										<td align="right">Pwd</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['web']['pwd'];?>" type='text' id="hosting-web-pwd" name='hosting-web-pwd' class="pulse-text" onblur="AjxInput('hosting-web-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-web-pwd-wait"></div></div>
										</td>
									</tr>
									<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>
									<tr><td align="right">SkyDrive</td><td></td></tr>
									<tr>
										<td align="right">Address</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left"><input type='text' id="hosting-mobile-addr"  name='hosting-mobile-addr' class="pulse-text" value="<?=$test=$properties['server']['hosting']['mobile']['addr']=='' ? 'localhost:80' : $properties['server']['hosting']['mobile']['addr'];?>" onblur="AjxInput('hosting-mobile-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-mobile-addr-wait"></div></div>
										</td>
									</tr>
									<tr>
										<td align="right">
											<input <?= ($properties['server']['hosting']['mobile']['ftp']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="hosting-mobile-ftp" name='hosting-mobile-ftp' class="pulse-text" value="hosting-mobile-ftp" onchange="AjxCheckBox('hosting-mobile-ftp', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
										</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left">FTP enabled<div class="stripped-right" id="hosting-mobile-ftp-wait"></div></div></div>				
										</td>
									</tr>
									<tr>
										<td align="right" width="300px">User</td>
										<td align="left" width="300px">
										<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['mobile']['user'];?>" type='text' id="hosting-mobile-user" name='hosting-mobile-user' class="pulse-text" onblur="AjxInput('hosting-mobile-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-mobile-user-wait"></div></div>
										</td>
									</tr>
									<tr>
										<td align="right">Pwd</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['mobile']['pwd'];?>" type='text' id="hosting-mobile-pwd" name='hosting-mobile-pwd' class="pulse-text" onblur="AjxInput('hosting-mobile-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-mobile-pwd-wait"></div></div>
										</td>
									</tr>
									<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>
									<tr><td align="right">For .Tablet WebApp</td><td></td></tr>
									<tr>
										<td align="right">Address</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left"><input type='text' id="hosting-tablet-addr"  name='hosting-tablet-addr' class="pulse-text" value="<?=$test=$properties['server']['hosting']['tablet']['addr']=='' ? 'localhost:80' : $properties['server']['hosting']['tablet']['addr'];?>" onblur="AjxInput('hosting-tablet-addr', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-tablet-addr-wait"></div></div>
										</td>
									</tr>
									<tr>
										<td align="right">
											<input <?= ($properties['server']['hosting']['tablet']['ftp']=='1') ? 'checked="checked"' : '';?> type='checkbox' id="hosting-tablet-ftp" name='hosting-tablet-ftp' class="pulse-text" value="hosting-tablet-ftp" onchange="AjxCheckBox('hosting-tablet-ftp', 'system/runtime/ProjCfgFilesFolders.server.php','post');"  />
										</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left">FTP enabled<div class="stripped-right" id="hosting-tablet-ftp-wait"></div></div></div>				
										</td>
									</tr>
									<tr>
										<td align="right" width="300px">User</td>
										<td align="left" width="300px">
										<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['tablet']['user'];?>" type='text' id="hosting-tablet-user" name='hosting-tablet-user' class="pulse-text" onblur="AjxInput('hosting-tablet-user', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-tablet-user-wait"></div></div>
										</td>
									</tr>
									<tr>
										<td align="right">Pwd</td>
										<td align="left">
										<div class="stripped"><div class="stripped-left"><input value="<?=$properties['server']['hosting']['tablet']['pwd'];?>" type='text' id="hosting-tablet-pwd" name='hosting-tablet-pwd' class="pulse-text" onblur="AjxInput('hosting-tablet-pwd', 'system/runtime/ProjCfgFilesFolders.server.php','post');" /></div><div class="stripped-right" id="hosting-tablet-pwd-wait"></div></div>
										</td>
									</tr>
									<tr><td colspan="2" style="border-bottom: 1px solid #cccccc;"></td></tr>					
								</table>
								</center>
			
							</div>
						</div>
						<!-- end of ms-selection-container-->
			<div id="bottom-spacer"></div>
		</div><!-- end of tss-tab6-->
    </div><!-- end of ms-selection main settings selection-->
</div><!-- end of settings-wrap-->