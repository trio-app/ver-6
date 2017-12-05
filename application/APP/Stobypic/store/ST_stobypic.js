  Ext.define('SystemAsset.Stobypic.model.M_stobypic', {
      extend: 'Ext.data.Model',
      fields: ['AssetPic','TotalAsset','AssetScanned','AssetNotScan']
    });
  Ext.define('SystemAsset.Stobypic.store.ST_stobypic', {
       extend  : 'Ext.data.Store',
       model   : 'SystemAsset.Stobypic.model.M_stobypic',
       //pageSize: 15,
       autoLoad : true,
       autoSync: true,
       proxy: {
           type: 'ajax',
           actionMethods:{read: 'POST'},
           api: {
               read: base_url + 'Stobypic/read'
           },
           reader: {
               type: 'json',
               root: 'Rows',
               totalProperty: 'TotalRows',
               successProperty: 'success'
           },
           writer: {
               type: 'json',
               writeAllFields: false
           }
       }
     });
