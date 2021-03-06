define({ "api": [
  {
    "type": "delete",
    "url": "/admin/v1/activity/:id",
    "title": "删除大转盘",
    "description": "<p>删除大转盘</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "id",
            "description": "<p>大转盘id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "DeleteAdminV1ActivityId"
  },
  {
    "type": "get",
    "url": "/admin/v1/activity",
    "title": "大转盘列表",
    "description": "<p>大转盘列表</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "user_id",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "GetAdminV1Activity"
  },
  {
    "type": "get",
    "url": "/admin/v1/activity/:id",
    "title": "大转盘详情",
    "description": "<p>大转盘详情</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "id",
            "description": "<p>大转盘id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "GetAdminV1ActivityId"
  },
  {
    "type": "get",
    "url": "/admin/v1/activity/publish/:id",
    "title": "发布活动",
    "description": "<p>发布活动</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "id",
            "description": "<p>大转盘id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "GetAdminV1ActivityPublishId"
  },
  {
    "type": "post",
    "url": "/admin/v1/activity",
    "title": "添加大转盘活动(基础设置)",
    "description": "<p>添加大转盘活动</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "user_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "title",
            "description": "<p>活动名称</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "remark",
            "description": "<p>分享描述</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "started_at",
            "description": "<p>开始时间</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "ended_at",
            "description": "<p>结束时间</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "share_pic",
            "description": "<p>分享图片</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_follow",
            "description": "<p>是否关注公众号</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_show",
            "description": "<p>是否显示参与人数</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "desc",
            "description": "<p>活动说明</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_broadcast",
            "description": "<p>是否轮播中奖信息</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "show_name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "show_mobile",
            "description": "<p>手机号码</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "show_address",
            "description": "<p>联系地址</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "pnumber",
            "description": "<p>参与活动人数</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "PostAdminV1Activity"
  },
  {
    "type": "post",
    "url": "/admin/v1/activity/business/:activity_id",
    "title": "商家设置",
    "description": "<p>商家设置</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>大转盘id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "name",
            "description": "<p>商家名称</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "logo",
            "description": "<p>商家logo</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "logo_show",
            "description": "<p>是否显示logo</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "loading_pic",
            "description": "<p>加载页面</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "loading_show",
            "description": "<p>是否显示加载页面</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "kefu_mobile",
            "description": "<p>客服电话</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "bgm",
            "description": "<p>背景音乐</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "bgm_show",
            "description": "<p>bgm是否展示</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "PostAdminV1ActivityBusinessActivity_id"
  },
  {
    "type": "post",
    "url": "/admin/v1/activity/rule/:activity_id",
    "title": "规则设置",
    "description": "<p>规则设置</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>大转盘id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_limited",
            "description": "<p>是否限制每人总共参与次数</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "e_atimes",
            "description": "<p>每人总共参与次数</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "e_etimes",
            "description": "<p>每人每天参与次数</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "e_wtimes",
            "description": "<p>每人总共中奖次数</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "e_ewtimes",
            "description": "<p>每人每天总中间次数</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "PostAdminV1ActivityRuleActivity_id"
  },
  {
    "type": "post",
    "url": "/api/v1/desc",
    "title": "活动攻略",
    "description": "<p>活动攻略</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>activity_id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "member_id",
            "description": "<p>member_id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "PostApiV1Desc"
  },
  {
    "type": "put",
    "url": "/admin/v1/activity/:id",
    "title": "编辑大转盘活动(基础设置)",
    "description": "<p>编辑大转盘活动</p>",
    "group": "Activity",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "user_id",
            "description": "<p>用户id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "title",
            "description": "<p>活动名称</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "remark",
            "description": "<p>分享描述</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "started_at",
            "description": "<p>开始时间</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "ended_at",
            "description": "<p>结束时间</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "share_pic",
            "description": "<p>分享图片</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_follow",
            "description": "<p>是否关注公众号</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_show",
            "description": "<p>是否显示参与人数</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "desc",
            "description": "<p>活动说明</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_broadcast",
            "description": "<p>是否轮播中奖信息</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "show_name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "show_mobile",
            "description": "<p>手机号码</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "show_address",
            "description": "<p>联系地址</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "pnumber",
            "description": "<p>参与活动人数</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ActivityController.php",
    "groupTitle": "Activity",
    "name": "PutAdminV1ActivityId"
  },
  {
    "type": "post",
    "url": "/api/v1/award",
    "title": "获奖记录轮播",
    "description": "<p>获奖记录轮播</p>",
    "group": "Api",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>activity_id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "member_id",
            "description": "<p>member_id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ApiController.php",
    "groupTitle": "Api",
    "name": "PostApiV1Award"
  },
  {
    "type": "post",
    "url": "/api/v1/award/my",
    "title": "我的奖品(前台)",
    "description": "<p>我的奖品</p>",
    "group": "Api",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "member_id",
            "description": "<p>member_id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>activity_id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ApiController.php",
    "groupTitle": "Api",
    "name": "PostApiV1AwardMy"
  },
  {
    "type": "post",
    "url": "/api/v1/baseInfo",
    "title": "获取基础信息(入口接口)",
    "description": "<p>获取基础信息(入口接口)</p>",
    "group": "Api",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>活动id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "member_id",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ApiController.php",
    "groupTitle": "Api",
    "name": "PostApiV1Baseinfo"
  },
  {
    "type": "post",
    "url": "/api/v1/person",
    "title": "个人信息提交",
    "description": "<p>个人信息提交</p>",
    "group": "Api",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>activity_id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "member_id",
            "description": "<p>member_id</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "address",
            "description": "<p>联系地址</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "mobile",
            "description": "<p>手机号码</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ApiController.php",
    "groupTitle": "Api",
    "name": "PostApiV1Person"
  },
  {
    "type": "post",
    "url": "/api/v1/prize",
    "title": "抽奖",
    "description": "<p>抽奖</p>",
    "group": "Api",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>活动id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "member_id",
            "description": "<p>用户id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/ApiController.php",
    "groupTitle": "Api",
    "name": "PostApiV1Prize"
  },
  {
    "type": "delete",
    "url": "/admin/v1/award",
    "title": "删除活动奖品",
    "description": "<p>删除活动奖品</p>",
    "group": "Award",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "id",
            "description": "<p>活动Id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/AwardController.php",
    "groupTitle": "Award",
    "name": "DeleteAdminV1Award"
  },
  {
    "type": "get",
    "url": "/admin/v1/award",
    "title": "获取活动奖品(奖项设置)",
    "description": "<p>获取活动奖品</p>",
    "group": "Award",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>活动id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/AwardController.php",
    "groupTitle": "Award",
    "name": "GetAdminV1Award"
  },
  {
    "type": "get",
    "url": "/admin/v1/prizeLevel",
    "title": "奖项等级",
    "description": "<p>奖项等级</p>",
    "group": "Award",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>活动Id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/AwardController.php",
    "groupTitle": "Award",
    "name": "GetAdminV1Prizelevel"
  },
  {
    "type": "post",
    "url": "/admin/v1/award",
    "title": "添加活动奖品",
    "description": "<p>添加活动奖品</p>",
    "group": "Award",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>活动id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "prize_name",
            "description": "<p>奖品名称</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "prize_level",
            "description": "<p>奖品等级</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "percent",
            "description": "<p>中奖概率</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "prize_pic",
            "description": "<p>中奖图片</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "sku",
            "description": "<p>奖品数量</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "sku_show",
            "description": "<p>奖品数量是否显示</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "mwtimes",
            "description": "<p>每天最多出奖数</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_winned",
            "description": "<p>是否出奖</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "type",
            "description": "<p>兑奖方式</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "address",
            "description": "<p>兑奖地址</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_fixed",
            "description": "<p>时间是否固定</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "cstimes",
            "description": "<p>兑奖开始时间</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "cetimes",
            "description": "<p>兑奖结束时间</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "notice",
            "description": "<p>兑奖须知</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/AwardController.php",
    "groupTitle": "Award",
    "name": "PostAdminV1Award"
  },
  {
    "type": "post",
    "url": "/admin/v1/award/cash",
    "title": "兑奖",
    "description": "<p>兑奖</p>",
    "group": "Award",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "id",
            "description": "<p>奖品id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "code",
            "description": "<p>兑奖码</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/AwardController.php",
    "groupTitle": "Award",
    "name": "PostAdminV1AwardCash"
  },
  {
    "type": "post",
    "url": "/admin/v1/award/record",
    "title": "活动数据",
    "description": "<p>活动数据</p>",
    "group": "Award",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>该转盘活动id</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "name",
            "description": "<p>姓名</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "mobile",
            "description": "<p>手机号码</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "prize_level",
            "description": "<p>奖励等级</p>"
          },
          {
            "group": "Parameter",
            "optional": true,
            "field": "is_checked",
            "description": "<p>兑奖状态</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/AwardController.php",
    "groupTitle": "Award",
    "name": "PostAdminV1AwardRecord"
  },
  {
    "type": "put",
    "url": "/admin/v1/award/:id",
    "title": "编辑活动奖品",
    "description": "<p>编辑活动奖品</p>",
    "group": "Award",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "id",
            "description": "<p>文件名称</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>活动id</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "prize_name",
            "description": "<p>奖品名称</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "prize_level",
            "description": "<p>奖品等级</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "percent",
            "description": "<p>中奖概率</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "prize_pic",
            "description": "<p>中奖图片</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "sku",
            "description": "<p>奖品数量</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "sku_show",
            "description": "<p>奖品数量是否显示</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "mwtimes",
            "description": "<p>每天最多出奖数</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_winned",
            "description": "<p>是否出奖</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "type",
            "description": "<p>兑奖方式</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "address",
            "description": "<p>兑奖地址</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "is_fixed",
            "description": "<p>时间是否固定</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "cstime",
            "description": "<p>兑奖开始时间</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "cetime",
            "description": "<p>兑奖结束时间</p>"
          },
          {
            "group": "Parameter",
            "optional": false,
            "field": "notice",
            "description": "<p>兑奖须知</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/AwardController.php",
    "groupTitle": "Award",
    "name": "PutAdminV1AwardId"
  },
  {
    "type": "post",
    "url": "/v1/upload",
    "title": "文件上传",
    "description": "<p>文件上传</p>",
    "group": "System",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "file",
            "description": "<p>文件名称</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/SystemController.php",
    "groupTitle": "System",
    "name": "PostV1Upload"
  },
  {
    "type": "get",
    "url": "/admin/v1/user/:user_id",
    "title": "获取用户信息",
    "description": "<p>获取用户信息</p>",
    "group": "User",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "user_id",
            "description": "<p>user_id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/UserController.php",
    "groupTitle": "User",
    "name": "GetAdminV1UserUser_id"
  },
  {
    "type": "post",
    "url": "/admin/v1/auth",
    "title": "授权appid(前台)",
    "description": "<p>授权appid</p>",
    "group": "User",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "user_id",
            "description": "<p>该用户id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/UserController.php",
    "groupTitle": "User",
    "name": "PostAdminV1Auth"
  },
  {
    "type": "post",
    "url": "/admin/v1/merbers",
    "title": "用户数据(后台)",
    "description": "<p>用户数据</p>",
    "group": "User",
    "permission": [
      {
        "name": "none"
      }
    ],
    "parameter": {
      "fields": {
        "Parameter": [
          {
            "group": "Parameter",
            "optional": false,
            "field": "activity_id",
            "description": "<p>activity_id</p>"
          }
        ]
      }
    },
    "version": "0.1.0",
    "success": {
      "examples": [
        {
          "title": "Success-Response:",
          "content": "HTTP/1.1 200 OK\n{\n}",
          "type": "json"
        }
      ]
    },
    "filename": "App/Http/Controllers/V1/UserController.php",
    "groupTitle": "User",
    "name": "PostAdminV1Merbers"
  }
] });
