### 1 录制

 1 发送classbegin信令，开始录制

 2 删除classbegin信令，结束录制，生成录制件

```objective-c
//1 初始化 RoomManager
RoomManager *roomMgr = [[RoomManager alloc] initPlaybackWithDelegate:self AndWB:self];
//2 进入房间
[roomMgr joinRoomWithHost:@"global.talk-cloud.net" Port:@"443" NickName:@"昵称" Params:@{@"host":@"global.talk-cloud.net",@"domain":@"test",@"serial": @"",@"type":@"0",@"path":@"" } Properties:nil lowConsume:NO];
//3 发送开始录制信令 convert：0 不转换（mkv） 1 webm 2 mp4
NSData *data = [NSJSONSerialization dataWithJSONObject:@{@"recordchat":@YES,convert:@(0)} options:NSJSONWritingPrettyPrinted error:nil];
NSString *str = [[NSString alloc] initWithData:data encoding:NSUTF8StringEncoding];
[_roomMgr pubMsg:@"ClassBegin" ID:@"ClassBegin" To:@"__all" Data:str Save:true AssociatedMsgID:nil AssociatedUserID:nil completion:nil]
//4 发送结束录制信令
[_roomMgr delMsg:@"ClassBegin" ID:@"ClassBegin" To:@"__all" Data:@{} completion:nil];
//5 发送信令时，底层SDK的回调
- (void)roomManagerOnRemoteMsg:(BOOL)add ID:(NSString*)msgID Name:(NSString*)msgName TS:(unsigned long)ts Data:(NSObject*)data InList:(BOOL)inlist{
    if ([msgName isEqualToString:@"ClassBegin"]) {
      	//发送ClassBegin add = yes  删除ClassBegin add = no
         if (add){
             //添加信令（比如开始录制）的时候，做处理。
           	
         }else{
              //删除信令（比如结束录制）的时候，做处理
         }
    }
}
```

userid:

- 每次进入房间时，每次都自动生成，保证唯一。
- 用户进入房间时，用户可以自己传userid，此时是传入值。

### 2 获取录制件接口

| 接口名称              | 接口URL                                    | 例子                                       |
| ----------------- | ---------------------------------------- | ---------------------------------------- |
| getUserRecordlist | http://IP地址:端口号/ClientAPI/getUserRecordlist | http://global.talk-cloud.net:80/ClientAPI/getUserRecordlist/key/5NIWjlgmvqwbt494/userid/ 123456 |

#### 2.1 参数

| 参数名      | 参数说明 | 类型     | 长度   | 缺省值  | 备注                        |
| -------- | ---- | ------ | ---- | ---- | ------------------------- |
| key      | 企业ID | string | 16   |      | 必填（预设：5NIWjlgmvqwbt494）   |
| recordts | 录制时间 | string |      |      | 选填  （缺省：所有录制件 其他值：录制开始时间） |
| 至少二选一    |      |        |      |      |                           |
| userid   | 用户id | string |      |      | 选填  （缺省：所有用户 其他值：某个用户的视频） |
| serial   | 房间id | string |      |      | 选填 （缺省：所有房间 其他值：某个房间的录制件） |

>  1.推荐：不传userid
>
>  如果用户调用joinRoom进入房间的接口时，参数里没有传入userid，则sdk端会随机生成一个userid，在用户进入房间的时候，通过sdk当前用户的属性返回，此时userid既是当前房间用户的唯一标示，也是这个录制件的唯一标示.
>
>  接口调用方式：
>
>  http://global.talk-cloud.net:80/ClientAPI/getUserRecordlist/key/5NIWjlgmvqwbt494/userid/ 123456
>
>  2.传userid
>
>  如果用户调用join进入房间的接口时，参数里传入userid，则sdk端会用用户传入的这个userid，此时userid只是当前房间用户的标示，如果用户从服务器获取录制件，需要在调用getUserRecordlist接口的时候，利用recordts +serial（或者userid）去确定这个录制件。
>
>  接口调用方式：
>
>  http://global.talk-cloud.net:80/ClientAPI/getUserRecordlist/key/5NIWjlgmvqwbt494/userid/ 123456/recordts/1511860322
>
>  3.recordts的获取
>
>  上述接口的recordts参数的获取。 需要用户发送classbegin信令，然后在接收到classbegin回调时获取到。

#### 2.2  返回数据：

```objective-c
[
"视频1url"
]
 
```


