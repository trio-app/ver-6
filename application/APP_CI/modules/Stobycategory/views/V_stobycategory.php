<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Stobycategory.controller.C_stobycategory'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_stobycategory',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    width: 435,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Stock Opname by Category\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 2/2,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Stobycategory.view.GRID_stobycategory',{
                        id: 'GRID_stobycategory',
                        store: Ext.create('SystemAsset.Stobycategory.store.ST_stobycategory')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_stobycategory"></div>