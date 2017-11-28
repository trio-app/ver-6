<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<!-- application title -->
		<title><?php echo strip_tags(app_title()) . ' - ' . strip_tags(app_ver()); ?></title>
		<!-- included file -->
		<link  href="<?php echo extjs_url('classic/theme-classic/resources/theme-classic-all.css'); ?>" rel="stylesheet" />
		<script src="<?php echo extjs_url('ext-all-debug.js'); ?>"></script>
		<script src="<?php echo extjs_url('classic/theme-classic/theme-classic.js'); ?>"></script>
		
	<script type="text/javascript">
		// base variable
		var base_url = '<?php echo base_url(); ?>';
		var extjs_url = '<?php echo extjs_url(); ?>';
 
	</script>   
	<script type="text/javascript">

		function sysLogout(){
			Ext.MessageBox.confirm('Confirmation', 'System Logout. Are you sure?', function(btn){
				if(btn == 'yes'){
					window.location.assign(base_url + 'Login/Signout');
				}
			});
		}

		Ext.onReady(function(){
			Ext.create('Ext.container.Viewport',{
				layout: 'border',
				margin: '5',
				items: [{
					region: 'north',
					margin: '5',
					items: [{
						xtype: 'toolbar',
						border: '0',
						items: [{
							xtype: 'button',
							text: 'Settings',
							icon: extjs_url + 'examples/classic/desktop/resources/images/gears.gif',
							menu: [{
								text: 'Reload Application',
								icon: extjs_url + 'examples/kitchensink/classic-en/resources/images/grid/refresh.gif'
							},{
								text: 'About',
								icon : extjs_url + 'examples/kitchensink/classic/resources/images/icons/fam/information.png',
								handler: function(){
									Ext.MessageBox.show({
									   title: 'About',
									   msg: '<?php echo app_title(); ?><br/><?php echo app_ver(); ?><br/>Copyright &copy; 2017',
									   buttons: Ext.MessageBox.OK,
									   icon: 'info'
								   });  
								}
							},'-',{
								text: 'Logout',
								icon: base_url + 'system/inc/images/close.png',
								handler: function(){
									sysLogout()
								}
							}]
						},'->',{
							xtype: 'box',
							html: '<?php echo app_title(); ?> <b> | </b> <?php echo app_ver(); ?>',
							padding: '0 10'
						}]
					}]
				},{
					region: 'west',
					margin: '0 5',
					collapsible: 1,
					autoScroll: true,
					title: 'Menu Utama',
					tools: [{
						type: 'refresh',
						handler: function(){
							Ext.getCmp('tree-panel').store.load();
						}
					}],
					items: [
						Ext.create('Ext.tree.Panel',{
							itemId: 'tree-panel',
							id: 'tree-panel',
							width: 200,
							height: 500,
							rootVisible: 0,
							border: 0,
							autoScroll: true,
							store: Ext.create('Ext.data.TreeStore',{
								rot: {
									expanded: true
								},
								proxy: {
									type: 'ajax',
									url: base_url + 'Home/menujs'
								}
							}),
							listeners: {
								itemClick: function(me, record){
									var isFolder = false;
									var thisTab = Ext.getCmp(record.data.id);
									isFolder = record.data.leaf;

									if(isFolder == true){
										if(!thisTab){
											var newtab = Ext.getCmp('contentTAB').add({
													title: record.data.text,
													id : record.data.id,
													//closable: true,
													closeAction: 'hide',
													autoDestroy:false,
													maximizable:true,
													layout:'fit',
													width:'100%',
													loader:{
														autoLoad:true,
														url:base_url + record.data.id,
														scripts:true
													}
													});
											Ext.getCmp('contentTAB').updateLayout();
											Ext.getCmp('contentTAB').setActiveTab(newtab);
										}else{
											Ext.getCmp('contentTAB').updateLayout();
											Ext.getCmp('contentTAB').setActiveTab(thisTab);
										}
									}
								}
							}
						})
					]
				},{
					region: 'center',
					xtype: 'tabpanel',
					id: 'contentTAB',
					margins: '0 5 5 0', // Atas - kanan - bawah - kiri,
					items: {
                                            layout: {
                                                type: 'fit',
                                                align: 'stretch'
                                            },
                                            title: 'Dashboard',
                                            closable: false,
                                            closeAction: 'hide',
                                            maximizable:true,
                                            autoWidth: true,
                                            autoHeight: true,
                                            autoScroll: true,
                                            autoLoad:{url:base_url + 'Home/dashboard' ,scripts:true}
					}
				},{
					region: 'south',
					margin: '5',
					items: [{
						xtype: 'toolbar',
						border: 0,
						defaults: {
							margin: '0 10'
						},
						items: [
							{ xtype: 'displayfield', fieldLabel: 'User Account ', value: '<span style="color:green"><?php echo $this->session->user_name; ?></span>' },
							'-',
							{ xtype: 'displayfield', fieldLabel: 'User Group ', value: '<span style="color:green"><?php echo $this->session->user_group; ?></span>' },
							'-',
							{ xtype: 'displayfield', fieldLabel: 'Server Name ', value: '<span style="color:green"><?php echo $this->db->hostname; ?></span>' },
							'-',
							{ xtype: 'displayfield', fieldLabel: 'Server Access ', value: '<span style="color:green"><?php echo $this->db->database; ?></span>' }
						]
					}]
				}]

			})
		})
	</script>
	</head>
	<body>
		<div id="ID_login"></div>
	</body>
</html>