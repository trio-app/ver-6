<script>
Ext.onReady(function () {
  
  Ext.application({
    name  : 'SystemAsset',
    appFolder: 'application/APP',
    controllers: ['SystemAsset.Tassetdata.controller.C_tassetdata'],
      launch: function () {
        Ext.create('Ext.container.Container', {
           layout: 'column',
           margin: '5',
           autoScroll: true,
           renderTo: 'ID_tassetdata',
           defaultType: 'container',
           items: [{
                columnWidth: 3/3,
                padding: '0 5 5',
                items: [{
                    xtype: 'panel',
                    frame: true,
                    html: '<h3 style="text-align:center;padding:0px 10px;margin:0px 10px;">\n\
                                    Master Data Asset\n\
                                </h3>'
                }
                ]
            },{
                columnWidth: 3/3,
                padding: '0 5 5',
                items:[
                    Ext.create('SystemAsset.Tassetdata.view.FRM_tassetdata',{
                        id: 'FRM_tassetdata',
                    })
                ]
            },{
                columnWidth: 3/3,
                padding: '0 5 5',
                items:[
                    Ext.create('SystemAsset.Tassetdata.view.GRID_tassetdata',{
                        id: 'GRID_tassetdata',
                        store: Ext.create('SystemAsset.Tassetdata.store.ST_tassetdata')
                    })
                ]
            }]

        });
      }
    }
  );
}); 
</script>
<div id='ID_tassetdata'>
    
</div>