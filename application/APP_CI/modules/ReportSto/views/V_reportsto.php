<script>
Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Reportsto.controller.C_reportsto'],
    launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_reportsto',
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
                items:[Ext.create('SystemAsset.Reportsto.view.FRM_reportsto',{
                        id: 'FRM_reportsto'
                    })
                ]
            },*/{
                columnWidth: 1/1,
                padding: '0 5 5 5',
                items:[
                    Ext.create('SystemAsset.Reportsto.view.GRID_reportsto',{
                        id: 'GRID_reportsto',
                        store: Ext.create('SystemAsset.Reportsto.store.ST_reportsto')
                    })
                ]
            }]

        });
    }
    }
  );
</script>
<div id="ID_reportsto"></div>