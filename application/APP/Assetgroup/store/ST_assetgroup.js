  Ext.define('SystemAsset.Assetgroup.model.M_assetgroup', {
    extend: 'Ext.data.Model',
    fields: ['GroupID', 'GroupName', 'GroupDescription']
  });

  Ext.define('SystemAsset.Assetgroup.store.ST_assetgroup', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Assetgroup.model.M_assetgroup',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: 'POST',
        api: {
            create: base_url + 'Assetgroup/create',
            read: base_url + 'Assetgroup/read',
            update: base_url + 'Assetgroup/update',
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
