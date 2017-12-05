<script>
Ext.onReady(function () {
  
  Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Tassetprint.controller.C_tassetprint'],
      launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_tassetprint',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Print Asset Data\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 3/3,
                padding: '0 5 5',
                items:[
                    Ext.create('SystemAsset.Tassetprint.view.GRID_tassetprint',{
                        id: 'GRID_tassetprint',
                        store: Ext.create('SystemAsset.Tassetprint.store.ST_tassetprint')
                    })
                ]
            }]

        });
      }
    }
  );
}); 
</script>
<div id='ID_tassetprint'>
    
</div>