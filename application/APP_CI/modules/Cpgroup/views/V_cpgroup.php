<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Cpgroup.controller.C_cpgroup'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_cpgroup',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Setting Group\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Cpgroup.view.FRM_cpgroup',{
                        id: 'FRM_cpgroup'
                    })
                ]
            },{
                columnWidth: 2/3,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Cpgroup.view.GRID_cpgroup',{
                        id: 'GRID_cpgroup',
                        store: Ext.create('SystemAsset.Cpgroup.store.ST_cpgroup')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_cpgroup"></div>