<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Stobylocation.controller.C_stobylocation'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_stobylocation',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    width: 435,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Stock Opname by Location\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 2/2,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Stobylocation.view.GRID_stobylocation',{
                        id: 'GRID_stobylocation',
                        store: Ext.create('SystemAsset.Stobylocation.store.ST_stobylocation')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_stobylocation"></div>