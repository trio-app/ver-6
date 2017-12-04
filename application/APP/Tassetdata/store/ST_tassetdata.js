  Ext.define('SystemAsset.Tassetdata.model.M_tassetdata', {
      extend: 'Ext.data.Model',
      fields: ['AssetID','AssetNo','AssetNoRegDept','AssetKey','AssetSAPNo','AssetName','AssetGroup',
'AssetCategory','AssetLocation','AssetSublocation','AssetCostcenter','AssetPic','AssetCondition',
'AssetRemark','AssetInfo','AssetAquisitiondate','AssetLabel','AssetCost'
]
    });
  Ext.define('SystemAsset.Tassetdata.store.ST_tassetdata', {
       extend  : 'Ext.data.Store',
       model   : 'SystemAsset.Tassetdata.model.M_tassetdata',
       autoLoad : true,
       autoSync: true,
       proxy: {
           type: 'ajax',
           actionMethods: {create: 'POST',read: 'POST',update: 'POST',destroy: 'POST'},
           api: {
               read: base_url + 'Tassetdata/read'
           },
           reader: {
               type: 'json',
               rootProperty: 'Rows',
               totalProperty: 'TotalRows',
               successProperty: 'success'
           },
           writer: {
               type: 'json',
               writeAllFields: false
           }
       }
     });
