<?php

namespace GeminiLabs\SiteReviews\Modules\Avatars;

abstract class AbstractSvgAvatar
{
    public function create(string $from): string
    {
        return $this->save($this->generate($from), $this->filename($from));
    }

    abstract public function generate(string $from): string;

    abstract protected function filename(string $from): string;

    protected function save(string $contents, string $name): string
    {
        $uploadsDir = wp_upload_dir();
        $baseDir = trailingslashit($uploadsDir['basedir']);
        $baseUrl = trailingslashit($uploadsDir['baseurl']);
        $pathDir = trailingslashit(glsr()->id).trailingslashit('avatars');
        $filename = sprintf('%s.svg', $name ?: 'blank');
        $filepath = $baseDir.$pathDir.$filename;
        if (!file_exists($filepath)) {
            wp_mkdir_p($baseDir.$pathDir);
            $fp = @fopen($filepath, 'wb');
            if (false === $fp) {
                return '';
            }
            mbstring_binary_safe_encoding();
            $dataLength = strlen($contents);
            $bytesWritten = fwrite($fp, $contents);
            reset_mbstring_encoding();
            fclose($fp);
            if ($dataLength !== $bytesWritten) {
                return '';
            }
            chmod($filepath, fileperms(ABSPATH.'index.php') & 0777 | 0644);
        }
        return set_url_scheme($baseUrl.$pathDir.$filename);
    }
}
