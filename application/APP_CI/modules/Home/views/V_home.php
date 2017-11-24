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
	                    	menu: [{
	                    		text: 'Reload Application'
	                    	},{
	                    		text: 'About'
	                    	},{
	                    		text: 'Update Detail'
	                    	},'-',{
	                    		text: 'Logout'
	                    	}]
	                    },'->',{
	                    	xtype: 'box',
		                    html: '<?php echo app_title(); ?> <b>|</b> <?php echo app_ver(); ?>',
		                    padding: '0 10'
	                    }]
                	}]
                },{
                	region: 'west',
                	margin: '0 5',
                	collapsible: 1,
                	title: 'Panel Kiri',
                	items: [{
                		xtype:'box',
                		border: 0,
                		width: 200
                	}]
                },{
                	region: 'center'
                },{
                	region: 'south',
                	margin: '5',
                	items: [{
	                    xtype: 'toolbar',
	                    border: 0,
	                    items: []
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