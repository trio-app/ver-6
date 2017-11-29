  Ext.define('SystemAsset.Assetcondition.model.M_assetcondition', {
    extend: 'Ext.data.Model',
    fields: ['conID', 'conName', 'conDescription']
  });

  Ext.define('SystemAsset.Assetcondition.store.ST_assetcondition', {
    extend  : 'Ext.data.Store',
    model   : 'SystemAsset.Assetcondition.model.M_assetcondition',
    autoLoad : true,
    autoSync: true,
    proxy: {
        type: 'ajax',
        actionMethods: {create: 'POST',read: 'POST',update: 'POST',destroy: 'POST'},
        api: {
            create: base_url + 'Assetcondition/create',
            read: base_url + 'Assetcondition/read',
            update: base_url + 'Assetcondition/update',
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
