<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Assetcategory.controller.C_assetcategory'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_assetcategory',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Master Data Asset Category\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Assetcategory.view.FRM_assetcategory',{
                        id: 'FRM_assetcategory'
                    })
                ]
            },{
                columnWidth: 2/3,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Assetcategory.view.GRID_assetcategory',{
                        id: 'GRID_assetcategory',
                        store: Ext.create('SystemAsset.Assetcategory.store.ST_assetcategory')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_assetcategory"></div>