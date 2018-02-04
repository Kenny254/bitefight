@extends('index')

@section('content')
    <div class="btn-left left"><div class="btn-right"><a href="<?php echo getUrl('message'); ?>" class="btn">back</a></div>
    </div>
    <br class="clearfloat">
    <div id="settings">
        <div class="wrap-top-left clearfix">
            <div class="wrap-top-right clearfix">
                <div class="wrap-top-middle clearfix"></div>
            </div>
        </div>
        <div class="wrap-left clearfix">
            <div class="wrap-content wrap-right clearfix">
                <h2><img src="<?php echo getAssetLink('img/symbols/race'.$user->race.'small.gif'); ?>" alt="">Settings</h2>
                <div class="table-wrap">
                    <p>Here you can set up which messages should be shifted to which folder. Folders can also be deleted here.</p>
                    <form action="<?php echo getUrl('message/settings'); ?>" method="POST">
                        <input type="hidden" name="<?php echo $this->security->getTokenKey() ?>" value="<?php echo $this->security->getToken() ?>"/>
                        <table cellpadding="3" cellspacing="2" border="0" width="100%">
                            <tbody>
                            <?php foreach ($msgSettings as $setting): ?>
                            <tr>
                                <td class="tdn"><?php echo \Bitefight\Models\MessageSettings::getMessageSettingStringByType($setting->setting); ?></td>
                                <td class="tdn">
                                    <select class="input" name="x<?php echo \Bitefight\Models\MessageSettings::getMessageSettingViewIdFromType($setting->setting); ?>" size="1">
                                        <option value="0" <?php if($setting->folder_id == 0) echo 'selected=""'; ?>><?php echo \Bitefight\Library\Translate::_('message_folder_select', ['folder' => \Bitefight\Library\Translate::_('inbox')]); ?></option>
                                        <?php foreach($folders as $folder): ?>
                                        <option value="<?php echo $folder->id; ?>"  <?php if($setting->folder_id == $folder->id) echo 'selected=""'; ?>><?php echo \Bitefight\Library\Translate::_('message_folder_select', ['folder' => e($folder->folder_name)]); ?></option>
                                        <?php endforeach; ?>
                                        <option value="-2" <?php if($setting->folder_id == -2) echo 'selected=""'; ?>><?php echo \Bitefight\Library\Translate::_('message_delete_immediately'); ?></option>
                                    </select>
                                </td>
                                <td><input type="checkbox" name="m<?php echo \Bitefight\Models\MessageSettings::getMessageSettingViewIdFromType($setting->setting); ?>" <?php if($setting->mark_read) echo 'checked=""'; ?>> <?php echo \Bitefight\Library\Translate::_('messages_mark_read'); ?></td>
                            </tr>
                            <?php endforeach; ?>
                            <tr>
                                <td class="tdn no-bg" colspan="2" align="center">
                                    <div class="btn-left right">
                                        <div class="btn-right">
                                            <input class="btn" type="submit" name="save" value="Save">
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
        <div class="wrap-bottom-left">
            <div class="wrap-bottom-right">
                <div class="wrap-bottom-middle"></div>
            </div>
        </div>
    </div>
@endsection