<?php
/**
 * 配列の中身を再帰的に空か判定するメソッド
 * @param array $array
 * @return boolean
 */
function multiEmpty($array)
{
    if(empty($array)){
        return true;
    }

    if(!is_array($array)) {
        if (!empty($array)) {
            return false;
        } else {
            return true;
        }
    }

    $rtn       = true;
    $secondRtn = true;
    foreach($array as $item){
        $secondRtn = multiEmpty($item);
        if(!$secondRtn){
            $rtn = $secondRtn;
            break;
        }
    }

    return $rtn;
}

/**
 * ディレクトリを777で再帰的に作成する関数
 * @param string $path ディレクトリ作成パス
 */
function makeDir($path)
{
    if (!file_exists($path)) {
        umask(0);

        mkdir($path, 0777, true);
    }
}

/**
 * ディレクトリとその内部のファイルを再帰的に削除する関数
 * @param string $path ディレクトリパス
 */
function removeDir($path)
{
    if ($dirHandle = opendir($path)) {
        while ($fileName = readdir($dirHandle)) {
            if ($fileName != "." && $fileName != ".." ) {
                unlink($path. $fileName);
            }
        }
        closedir ($dirHandle);
        rmdir($path);
    }
}

/**
 * フォームで送信されたファイルを保存する関数
 * @param arrray $uploadFile フォーム送信ファイルパラメータ
 * @param string $saveDir ファイル保存先ディレクトリ
 * @param string $saveName ファイル保存名
 *
 * @return boolean
 */
function putFile($uploadFile, $saveDir, $saveName)
{
    makeDir($saveDir);
    return (rename($uploadFile->getPathName(), $saveDir. $saveName));
}

/**
 * DataUri形式からファイルを保存する関数
 * @param arrray $uploadFile フォーム送信ファイルパラメータ
 * @param string $saveDir ファイル保存先ディレクトリ
 * @param string $saveName ファイル保存名
 *
 * @return file_put_contentsの結果
 */
function putFileFromDataUri($uploadFile, $saveDir, $saveName)
{
    makeDir($saveDir);
    list($ext, $data)   = explode(';', $uploadFile);
    list(, $data)       = explode(',', $data);
    $data = base64_decode($data);

    return (file_put_contents($saveDir. $saveName, $data));
}

/**
 * mimetypeから画像の拡張子を取得する関数
 * @param string $mime mimetype
 *
 * @return mixed $ext
 */
function imgMimeToExt($mime)
{
    switch($mime) {
        case 'image/jpeg':
            $ext = 'jpg';
            break;

        case 'image/png':
            $ext = 'png';
            break;

        case 'image/gif':
            $ext = 'gif';
            break;

        default:
            $ext = false;
    }

    return $ext;
}

