<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Stobycostcenter.controller.C_stobycostcenter'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_stobycostcenter',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    width: 435,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Stock Opname by Cost Center\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 2/2,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Stobycostcenter.view.GRID_stobycostcenter',{
                        id: 'GRID_stobycostcenter',
                        store: Ext.create('SystemAsset.Stobycostcenter.store.ST_stobycostcenter')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_stobycostcenter"></div>