<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Assetsublocation.controller.C_assetsublocation'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_assetsublocation',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Master Data Asset Sub Location\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Assetsublocation.view.FRM_assetsublocation',{
                        id: 'FRM_assetsublocation'
                    })
                ]
            },{
                columnWidth: 2/3,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Assetsublocation.view.GRID_assetsublocation',{
                        id: 'GRID_assetsublocation',
                        store: Ext.create('SystemAsset.Assetsublocation.store.ST_assetsublocation')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_assetsublocation"></div>