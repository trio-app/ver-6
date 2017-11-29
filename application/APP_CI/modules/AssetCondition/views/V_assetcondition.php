<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Assetcondition.controller.C_assetcondition'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_assetcondition',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Master Data Asset Condition\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Assetcondition.view.FRM_assetcondition',{
                        id: 'FRM_assetcondition'
                    })
                ]
            },{
                columnWidth: 2/3,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Assetcondition.view.GRID_assetcondition',{
                        id: 'GRID_assetcondition',
                        store: Ext.create('SystemAsset.Assetcondition.store.ST_assetcondition')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_assetcondition"></div>