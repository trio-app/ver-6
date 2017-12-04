<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Cpuser.controller.C_cpuser'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_cpuser',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Setting User Access\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Cpuser.view.FRM_cpuser',{
                        id: 'FRM_cpuser'
                    })
                ]
            },{
                columnWidth: 2/3,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Cpuser.view.GRID_cpuser',{
                        id: 'GRID_cpuser',
                        store: Ext.create('SystemAsset.Cpuser.store.ST_cpuser')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_cpuser"></div>