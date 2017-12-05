<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Stobygroup.controller.C_stobygroup'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_stobygroup',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    width: 435,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Stock Opname by Group\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 2/2,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Stobygroup.view.GRID_stobygroup',{
                        id: 'GRID_stobygroup',
                        store: Ext.create('SystemAsset.Stobygroup.store.ST_stobygroup')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_stobygroup"></div>