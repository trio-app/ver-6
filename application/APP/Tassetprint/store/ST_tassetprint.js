Ext.define('SystemAsset.Tassetprint.model.M_tassetprint', {
  extend: 'Ext.data.Model',
  fields: ['AssetID','chkprint','AssetNo','AssetNoRegDept','AssetKey','AssetName','AssetGroup','AssetCategory',
           'AssetLocation','AssetSublocation','AssetPic','AssetCondition','AssetRemark',
           'AssetInfo','AssetAquisitiondate','AssetLabel']
});

    Ext.define('SystemAsset.Tassetprint.store.ST_tassetprint', {
       extend  : 'Ext.data.Store',
       model   : 'SystemAsset.Tassetprint.model.M_tassetprint',
       pageSize: 15,
       autoLoad : true,
       autoSync: true,
       proxy: {
           type: 'ajax',
           actionMethods: 'POST',
           api: {
               read: base_url + 'Tassetprint/read'
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