<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Assetlocation.controller.C_assetlocation'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_assetlocation',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Master Data Asset Location\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Assetlocation.view.FRM_assetlocation',{
                        id: 'FRM_assetlocation'
                    })
                ]
            },{
                columnWidth: 2/3,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Assetlocation.view.GRID_assetlocation',{
                        id: 'GRID_assetlocation',
                        store: Ext.create('SystemAsset.Assetlocation.store.ST_assetlocation')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_assetlocation"></div>