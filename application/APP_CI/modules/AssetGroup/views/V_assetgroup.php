<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Assetgroup.controller.C_assetgroup'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_assetgroup',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Master Data Asset Group\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Assetgroup.view.FRM_assetgroup',{
                        id: 'FRM_assetgroup'
                    })
                ]
            },{
                columnWidth: 2/3,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Assetgroup.view.GRID_assetgroup',{
                        id: 'GRID_assetgroup',
                        store: Ext.create('SystemAsset.Assetgroup.store.ST_assetgroup')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_assetgroup"></div>