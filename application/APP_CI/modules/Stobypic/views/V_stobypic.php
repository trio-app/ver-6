<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Stobypic.controller.C_stobypic'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_stobypic',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    width: 435,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Stock Opname by PIC\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 2/2,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Stobypic.view.GRID_stobypic',{
                        id: 'GRID_stobypic',
                        store: Ext.create('SystemAsset.Stobypic.store.ST_stobypic')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_stobypic"></div>