![Image](https://raw.githubusercontent.com/MrDoomy/Link2Media/master/dev/images/link2media.png)

This is an awesome tool to convert any link to an audio or video file.

This includes features like :
- Convert a link into audio format file
- Or convert a link into video format file
- Beautiful Material Design interface
- Optimised for Linux architecture

#Prerequisites

You need to install those two software on your Linux server

- YouTube-DL

```shell
   sudo pip3 install -U youtube-dl
```

- FFMpeg

```shell
   cd /usr/src
   sudo git clone git://source.ffmpeg.org/ffmpeg.git
   cd ffmpeg
   sudo ./configure --arch=armel --target-os=linux --enable-gpl --enable-nonfree
   make
   sudo make install
```

#Setting

To run the application at home, you must change the path to the registration folder in the following files :
<<<<<<< HEAD
- php/config.php
=======
- php/`download.php`
- php/`script.php`
>>>>>>> origin/master

#Screenshot

![Image](https://raw.githubusercontent.com/MrDoomy/Link2Media/master/dev/screenshots/computer_small.png)

#License

    Copyright (C) 2016 Mr Doomy

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.
