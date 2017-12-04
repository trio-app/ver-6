<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Rassetdata.controller.C_rassetdata'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_rassetdata',
           defaultType: 'container',
           items: [{
                columnWidth: 2/2,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Report Asset Data\n\
                                </h3>'
                }
                ]
            },/*{
                columnWidth: 1/3,
                padding: '0 5 5 5',
                items:[Ext.create('SystemAsset.Rassetdata.view.FRM_rassetdata',{
                        id: 'FRM_rassetdata'
                    })
                ]
            },*/{
                columnWidth: 1/2,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Rassetdata.view.GRID_rassetdata',{
                        id: 'GRID_rassetdata',
                        store: Ext.create('SystemAsset.Rassetdata.store.ST_rassetdata')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_rassetdata"></div>