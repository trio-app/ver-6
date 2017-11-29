<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Assetcost.controller.C_assetcost'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_assetcost',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Master Data Asset CostCenter\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Assetcost.view.FRM_assetcost',{
                        id: 'FRM_assetcost'
                    })
                ]
            },{
                columnWidth: 2/3,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Assetcost.view.GRID_assetcost',{
                        id: 'GRID_assetcost',
                        store: Ext.create('SystemAsset.Assetcost.store.ST_assetcost')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_assetcost"></div>